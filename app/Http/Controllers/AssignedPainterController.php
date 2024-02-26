<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignedPainterJob;
use App\Models\PainterJob;
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
            ]);

            // Return a JSON response
            return redirect()->back()->with('go_back', true)->with('success', 'Assign Successfully successfully.');
        } else {
            // Handle the case where 'assigned_painter_name' is not provided

            return response()->json(['error' => 'Assigned painter name is required'], 400); // 400 Bad Request
        }
    }
    public function saveMessage(Request $request, $assign_painter)
    {
        // Validate the request if necessary
        $request->validate([
            'message' => 'required|string',
        ]);

        // Find the existing row in assigned_painter_job table
        $assignedPainterJob = AssignedPainterJob::where('id', $assign_painter)->first();

        // Update the assign_job_description column content
        if ($assignedPainterJob) {
            $existingDescription = $assignedPainterJob->assign_job_description;
            $updatedDescription = $existingDescription .  "\n\n"  . $request->message;
            // Append the new message
            $assignedPainterJob->update(['assign_job_description' => $updatedDescription]);
        } else {
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
