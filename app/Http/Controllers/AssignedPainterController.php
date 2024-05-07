<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignedPainterJob;
use App\Models\PainterJob;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class AssignedPainterController extends Controller
{
    public function UserAssign(Request $request, $id)
    {
        // Check if the request has 'assigned_painter_name' input
        if ($request->has('assigned_painter_name')) {
            $assign_job_price = $request->input('assign_price_job');
            $paintCost = $request->input('paint_cost');
            $painterId = $request->input('assigned_painter_name'); // Assuming this should be the painter's ID
            $extrasMessage = $request->input('assign_job_description');

            $ans1 = $request->input('Q_1');
            $ans2 = $request->input('Q_2');
            $ans3 = $request->input('Q_3');

            $jobId = $id;

            // Retrieve the PainterJob
            $painterJob = PainterJob::find($jobId);

            if ($painterJob) {
                // Update the PainterJob with the assigned painter ID
                $painterJob->assign_painter = $painterId;
                $painterJob->save(); // Save the update
            } else {
                // Handle the case where the specified PainterJob doesn't exist

                return response()->json(['error' => 'The specified job does not exist'], 404); // 404 Not Found
            }
            $assignedPainterJob = AssignedPainterJob::create([
                'job_id' => $jobId,
                'assign_price_job' => $assign_job_price,
                'assigned_painter_name' => $painterId, // Assuming this stores the painter's ID or name correctly
                'paint_cost' => $paintCost,
                'assign_job_description' => $extrasMessage,
                'status' => 1,
                'Q_1' => $ans1,
                'Q_2' => $ans2,
                'Q_3' => $ans3,

            ]);

            //push notification shart
            $user = User::find( $painterId);
            if ($user) {
            $firebaseToken = $user->device_token; 
            } else {
            $firebaseToken = null; 
            }
            $SERVER_API_KEY = 'AAAA-_tCmgY:APA91bGCOWTO-2jSJ_PHwatoh_ihC0sB_LBWMlRphSwgP7HCRz4vqVBuPWAIiECM9fCAQfZcnH3_Qoi3SrLghvW1V0J4qbjTgTWAKHwEhJbfTjYMXZLgXcladYR7PbxYGIKBYUODZUcn';
            $notificationBody = isset($painterJob) ? $painterJob->address : 'New Job Available!';
            $data = ["registration_ids" => [$firebaseToken],

            "notification" => [
            "title" => "You Have Received a New Job !",
            "body" =>   $notificationBody,
            "content_available" => true,
            "priority" => "high",
            ]
            ];
            $dataString = json_encode($data);

            $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

            $response = curl_exec($ch);
            //push notification end

            // Find the painter user
            $user = User::findOrFail($painterId);
            $maxId = Invoice::max('id');
            $nextId = $maxId + 1;
            $maxInvoiceNumber = sprintf('INV: %04d', $nextId);
            $data = [
                'user_id' => $painterId,
                'company_name' => $user->company_name,
                'user_address' => $user->address,
                'user_name' => $user->first_name,
                'user_phone' => $user->phone,
                'abn' => $user->abn,
                'customer_id' => $request->user()->company_name,
                'send_email' => $request->user()->email,
                'inv_number' => $maxInvoiceNumber,
                'date' => now()->toDateString(),
                'purchase_order' => null,
                'job_id' => $id,
                'description' => $request->assign_job_description,
                'address' => $painterJob->address,
                'job_details' => $extrasMessage,
                'amount' => $assign_job_price - ($assign_job_price * 0.10),
                'gst' => $assign_job_price * 0.10,
                'total_due' => $assign_job_price,
                'status' => 1,
            ];

            // Create the invoice
            $invoice = Invoice::create($data);
            // Return a JSON response
            return Redirect::route('main')->withErrors(['success' => 'Assign Successfully successfully.!']);
        } else {
            // Handle the case where 'assigned_painter_name' is not provided

            return response()->json(['error' => 'Assigned painter name is required'], 400); // 400 Bad Request
        }
    }
    public function saveMessage(Request $request, $assign_painter, $jobId)
    {
        // Validate the request if necessary
        $request->validate([
            'message' => 'required|string',
        ]);

        // Find the existing row in assigned_painter_job table
        $assignedPainterJob = AssignedPainterJob::where('id', $assign_painter)->first();
        $job = PainterJob::findOrFail($jobId);
        // Update the assign_job_description column content
        if ($assignedPainterJob) {
            $existingDescription = $assignedPainterJob->assign_job_description;
            $updatedDescription = $existingDescription .  "\n\n"  . $request->message;
            // Append the new message
            $job->update(['start_date' => $request->start_date]);
            $assignedPainterJob->update(['assign_job_description' => $updatedDescription]);
        } else {
            $job->update(['start_date' => $request->start_date]);
            // If no existing row found, create a new one
            AssignedPainterJob::create([
                'assign_painter_id' => $assign_painter,
                'assign_job_description' => $request->message,
            ]);
        }

        // You can perform additional logic here if needed

        return Redirect::back()->with('success', 'Message saved successfully');
    }
}
