<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BuilderModel;
use App\Models\Customer;
use App\Mail\SendInvoice;
use App\Models\Invoice;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\PainterJob;
use App\Models\PoItems;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuilderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PainterJobController;
use App\Http\Controllers\WebsiteSettingController;
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SubcustomerController;
use App\Http\Controllers\PainterJobPlanController;
use App\Models\InvoicePayment;
use Illuminate\Support\Facades\DB;


class InvoiceController extends Controller
{
    public function store(Request $request)
    {

        $user_id = $request->user()->id;
        $validatedData = $request->validate([
            'customer_id' => 'nullable|string',
            'send_email' => 'required|email',
            'inv_number' => 'required|string',
            'date' => 'required|date',
            'purchase_order' => 'nullable|string',
            'job_id' => 'nullable|string',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'job_details' => 'nullable|string',
            'amount' => 'required|numeric',
            'gst' => 'required|numeric',
            'total_due' => 'required|numeric',
            'status' => 'required|numeric',
        ]);
        $validatedData['user_id'] = $user_id;

        if ($request->input('action') == 'send&save') {
            // Prepare data for the PDF
            $painterUser = $request->user();
            $user = User::find($painterUser->id);
            $company_name = $user->company_name;
            $user_address = $user->address;
            $user_name = $user->first_name;
            $user_phone = $user->phone;
            $user_abn = $user->abn;

            $data = [
                'user_id' => $request->user()->id,
                'company_name' =>  $company_name,
                'user_address' =>  $user_address,
                'user_name' =>  $user_name,
                'user_phone' =>  $user_phone,
                'abn' => $user_abn,
                'customer_id' => $request->customer_id,
                'send_email' => $request->send_email,
                'inv_number' =>  $request->inv_number,
                'date' =>  $request->date,
                'purchase_order' =>  $request->purchase_order,
                'job_id' =>  $request->job_id,
                'description' =>   $request->description,
                'address' =>  $request->address,
                'job_details' =>  $request->job_details,
                'amount' =>  $request->amount,
                'gst' =>  $request->gst,
                'total_due' =>  $request->total_due,
                'status' =>  $request->status,
            ];

            try {

                // Generate the PDF
                $pdf = PDF::loadView('new_shop.invoice.invices_pdf', $data);
                $attachmentPath = null;
                if ($request->hasFile('attachment')) {
                    $file = $request->file('attachment');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $attachmentPath = $file->storeAs('', $fileName, 'public');
                    $validatedData['attachment'] = $attachmentPath;
                }
                Mail::send('new_shop.invoice.invoice_mess', ['data' => $data, 'attachmentPath' => $attachmentPath,  'company_name' => $company_name, 'username' => $user_name], function ($message) use ($data, $pdf, $attachmentPath) {
                    $message->to($data["send_email"])
                        ->subject("Your Invoice - " . $data['address'])
                        ->attachData($pdf->output(), "invoice.pdf");
                    if ($attachmentPath) {
                        $fullPath = public_path('uploads/' . $attachmentPath);
                        $message->attach($fullPath);
                    }
                });

                // Mail::send('new_shop.invoice.invices_pdf', $data, function ($message) use ($data, $pdf, $attachmentPath) {
                //     $message->to($data["send_email"])
                //         ->subject("Your Invoice - " . $data['address'])
                //         ->attachData($pdf->output(), "invoice.pdf");
                //     if ($attachmentPath) {
                //         $fullPath = public_path('uploads/' . $attachmentPath);
                //         $message->attach($fullPath);
                //     }
                // });
                $validatedData['status'] = 2;
                $validatedData['send_to'] = Carbon::now()->format('d-m-Y H:i:s');
                $invoice = Invoice::create($validatedData);
                // $poitem = Poitem::find($poitemId);
                return redirect()->back()->with('go_back', true)->with('success', 'Invoice created & Send successfully.');
            } catch (\Exception $e) {
                // Handle the exception
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        if ($request->input('action') == 'save') {
            if ($request->hasFile('attachment')) {
                $fileName = time() . '_' . $request->file('attachment')->getClientOriginalName();
                $validatedData['attachment'] = $request->file('attachment')->storeAs('', $fileName, 'public');
            }
            $invoice = Invoice::create($validatedData);
            return redirect()->back()->with('go_back', true)->with('success', 'Invoice created successfully.');
        }
    }


    public function invoice_send(Request $request, $jobs_id, $poItem_id)
    {
        $customers = Customer::all()->where('user_id', $request->user()->id);
        $jobs = PainterJob::with('superviser', 'poitem')
            ->where('id', $jobs_id)
            ->where('user_id', $request->user()->id)
            ->whereNull('parent_id')
            ->first();
        if ($jobs->admin_builders !== null) {

            $admin_builders = BuilderModel::where('company_name', $jobs->admin_builders->name)->first();
            $poItem = $jobs->poitem()->where('id', $poItem_id)->first();
            $invoice = Invoice::where('id', $poItem->invoice_id)->first();
            $invoice = Invoice::where('id', $poItem->invoice_id)
                ->where('batch', $poItem->batch)
                ->first();

            $inv_numbers = Invoice::max('id') ?? 0;

            return view('new_shop.invoice.send_invices', compact('customers', 'jobs', 'poItem', 'inv_numbers', 'admin_builders', 'invoice'));
        }
    }

    public function invoice_savesend(Request $request, $jobs_id, $poItem_id)
    {
        $painterUser = $request->user()->id;
        $user = User::find($painterUser);
        $company_name = $user->company_name;
        $user_address = $user->address;
        $user_name = $user->first_name;
        $user_phone = $user->phone;
        $user_abn = $user->abn;

        $validatedData = $request->validate([
            'user_id' => 'nullable|string',
            'customer_id' => 'nullable|string',
            'send_email' => 'required|email',
            'inv_number' => 'required|string',
            'date' => 'required|date',
            'purchase_order' => 'nullable|string',
            'job_id' => 'nullable|string',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'job_details' => 'nullable|string',
            'amount' => 'required|numeric',
            'gst' => 'required|numeric',
            'total_due' => 'required|numeric',
            'status' => 'required|numeric',
            'batch' => 'nullable|numeric',
            'send_to' => 'nullable|string',
        ]);

        if ($request->input('action') == 'send&save') {

            // Prepare data for the PDF


            $painterUser = $request->user()->id;
            $user = User::find($painterUser);
            $company_name = $user->company_name;
            $user_address = $user->address;
            $user_name = $user->first_name;
            $user_phone = $user->phone;
            $user_abn = $user->abn;

            $data = [
                'user_id' => $painterUser,
                'company_name' =>  $company_name,
                'user_address' =>  $user_address,
                'user_name' =>  $user_name,
                'user_phone' =>  $user_phone,
                'abn' => $user_abn,
                'customer_id' => $request->customer_id,
                'send_email' => $request->send_email,
                'inv_number' =>  $request->inv_number,
                'date' =>  $request->date,
                'purchase_order' =>  $request->purchase_order,
                'job_id' =>  $request->job_id,
                'description' =>   $request->description,
                'address' =>  $request->address,
                'job_details' =>  $request->job_details,
                'amount' =>  $request->amount,
                'gst' =>  $request->gst,
                'total_due' =>  $request->total_due,
                'status' =>  $request->status,
                'batch' => $request->batch,
            ];

            try {
                // Initialize PDF
                $pdf = PDF::loadView('new_shop.invoice.invices_pdf', $data);

                // Initialize attachment path
                $attachmentPath = null;

                // Check if the status is not 2
                if ($request->status !== 2) {
                    // Validate and set the status to 2
                    $validatedData = $request->validate([
                        'user_id' => 'nullable|string',
                        'customer_id' => 'nullable|string',
                        'send_email' => 'required|email',
                        'inv_number' => 'required|string',
                        'date' => 'required|date',
                        'purchase_order' => 'nullable|string',
                        'job_id' => 'nullable|string',
                        'address' => 'required|string',
                        'description' => 'nullable|string',
                        'job_details' => 'nullable|string',
                        'amount' => 'required|numeric',
                        'gst' => 'required|numeric',
                        'total_due' => 'required|numeric',
                        'status' => 'required|numeric',
                        'batch' => 'nullable|numeric',
                        'send_to' => 'nullable|string',
                    ]);
                    $validatedData['user_id'] = $request->user()->id;
                    $validatedData['status'] = 2;
                    $validatedData['send_to'] = Carbon::now()->format('d-m-Y H:i:s');


                    // Check if there's an attachment file
                    if ($request->hasFile('attachment')) {
                        $file = $request->file('attachment');
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $attachmentPath = $file->storeAs('', $fileName, 'public');
                        $validatedData['attachment'] = $attachmentPath;
                    }

                    // Create a new invoice
                    $invoice = Invoice::create($validatedData);

                    // Update the related PoItems
                    $poitem = PoItems::find($poItem_id);
                    $poitem->update([
                        "job_id" => $jobs_id,
                        "ponumber" => $request->purchase_order,
                        "description" => $request->description,
                        "job_details" => $request->job_details,
                        "price" => $request->amount,
                        "invoice_id" => $invoice->id,
                    ]);
                }

                // Send the email with the PDF and attachment (if available)
                Mail::send('new_shop.invoice.invoice_mess', ['data' => $data, 'attachmentPath' => $attachmentPath,  'company_name' => $company_name, 'username' => $user_name], function ($message) use ($data, $pdf, $attachmentPath) {
                    $message->to($data["send_email"])
                        ->subject("Your Invoice - " . $data['address'])
                        ->attachData($pdf->output(), "invoice.pdf");
                    if ($attachmentPath) {
                        $fullPath = public_path('uploads/' . $attachmentPath);
                        $message->attach($fullPath);
                    }
                });

                // Redirect with success message
                // return redirect()->back()->with('success', 'Invoice saved and email sent successfully.');
                return redirect()->back()->with('go_back', true)->with('success', 'Invoice saved and email sent successfully.');
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        if ($request->input('action') == 'send') {

            $painterUser = $request->user();
            $user = User::find($painterUser->id);
            $company_name = $user->company_name;
            $user_address = $user->address;
            $user_name = $user->first_name;
            $user_phone = $user->phone;
            $user_abn = $user->abn;
            // Prepare data for the PDF
            $data = [
                'user_id' => $painterUser->id,
                'company_name' => $company_name,
                'user_address' => $user_address,
                'user_name' =>  $user_name,
                'user_phone' =>  $user_phone,
                'abn' => $user_abn,
                'customer_id' => $request->customer_id,
                'send_email' => $request->send_email,
                'inv_number' =>  $request->inv_number,
                'date' =>  $request->date,
                'purchase_order' =>  $request->purchase_order,
                'job_id' =>  $request->job_id,
                'description' =>   $request->description,
                'address' =>  $request->address,
                'job_details' =>  $request->job_details,
                'amount' =>  $request->amount,
                'gst' =>  $request->gst,
                'total_due' =>  $request->total_due,
                'status' =>  $request->status,


            ];

            try {

                $pdf = PDF::loadView('new_shop.invoice.invices_pdf', $data);
                $attachmentPath = null;

                if ($request->status !== 2) {
                    $validatedData = $request->validate([
                        'user_id' => 'nullable|string',
                        'customer_id' => 'nullable|string',
                        'send_email' => 'required|email',
                        'inv_number' => 'required|string',
                        'date' => 'required|date',
                        'purchase_order' => 'nullable|string',
                        'job_id' => 'nullable|string',
                        'description' => 'nullable|string',
                        'address' => 'required|string',
                        'job_details' => 'nullable|string',
                        'amount' => 'required|numeric',
                        'gst' => 'required|numeric',
                        'total_due' => 'required|numeric',
                        'status' => 'required|numeric',
                        'batch' => 'nullable|string',
                        'send_to' => 'nullable|string',

                    ]);

                    $validatedData['user_id'] = $painterUser->id;
                    $validatedData['status'] = 2;
                    $validatedData['send_to'] = Carbon::now()->format('d-m-Y H:i:s');
                    $poItem = PoItems::find($poItem_id);
                    $invoice = Invoice::find($poItem->invoice_id);
                    if ($invoice) {
                        $invoice->update($validatedData);
                    }
                    if ($request->hasFile('attachment')) {
                        $file = $request->file('attachment');
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $attachmentPath = $file->storeAs('', $fileName, 'public');
                        $validatedData['attachment'] = $attachmentPath;
                    }

                    $poitem = PoItems::find($poItem_id);
                    $poitem->update([
                        "job_id" => $jobs_id,
                        "ponumber" => $request->purchase_order,
                        "description" => $request->description,
                        "job_details" => $request->job_details,
                        "price" => $request->amount,
                        "invoice_id" => $invoice->id,
                    ]);
                }
                Mail::send('new_shop.invoice.invoice_mess', ['data' => $data, 'attachmentPath' => $attachmentPath,  'company_name' => $company_name, 'username' => $user_name], function ($message) use ($data, $pdf, $attachmentPath) {
                    $message->to($data["send_email"])
                        ->subject("Your Invoice - " . $data['address'])
                        ->attachData($pdf->output(), "invoice.pdf");
                    if ($attachmentPath) {
                        $fullPath = public_path('uploads/' . $attachmentPath);
                        $message->attach($fullPath);
                    }
                });

                // Redirect with success message
                return redirect()->back()->with('go_back', true)->with('success', 'Invoice Sent to Email & updated successfully.');
                // return redirect()->back()->with('success', 'Invoice Sent to Email & updated successfully.');
            } catch (\Exception $e) {
                // Handle the exception
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        if ($request->input('action') == 'save') {
            if ($request->hasFile('attachment')) {
                $fileName = time() . '_' . $request->file('attachment')->getClientOriginalName();
                $validatedData['attachment'] = $request->file('attachment')->storeAs('', $fileName, 'public');
            }
            $validatedData['user_id'] = $request->user()->id;
            $invoice = Invoice::create($validatedData);
            $poitem = PoItems::find($poItem_id);
            $poitem->update([
                "job_id" => $jobs_id,
                "ponumber" => $request->purchase_order,
                "description" => $request->description,
                "job_details" => $request->job_details,
                "price" => $request->amount,
                "invoice_id" => $invoice->id,
            ]);
            // return redirect()->back()->with('success', 'Invoice created successfully.');
            return redirect()->back()->with('go_back', true)->with('success', 'Invoice created successfully.');
        }

        if ($request->input('action') == 'update') {
            $painterUser = $request->user();
            $user = User::find($painterUser->id);
            $company_name = $user->company_name;
            $user_address = $user->address;
            $user_name = $user->first_name;
            $user_phone = $user->phone;
            $user_abn = $user->abn;

            $validatedData = [
                'user_id' => $painterUser->id,
                'company_name' => $company_name,
                'user_address' => $user_address,
                'user_name' =>  $user_name,
                'user_phone' =>  $user_phone,
                'abn' => $user_abn,
                'customer_id' => $request->customer_id,
                'send_email' => $request->send_email,
                'inv_number' =>  $request->inv_number,
                'date' =>  $request->date,
                'purchase_order' =>  $request->purchase_order,
                'job_id' =>  $request->job_id,
                'description' =>   $request->description,
                'address' =>  $request->address,
                'job_details' =>  $request->job_details,
                'amount' =>  $request->amount,
                'gst' =>  $request->gst,
                'total_due' =>  $request->total_due,

            ];
            $poItem = PoItems::find($poItem_id);
            $invoice = Invoice::find($poItem->invoice_id);
            if ($invoice) {
                $validatedData['status'] = 1;
                if ($request->hasFile('attachment')) {
                    $fileName = time() . '_' . $request->file('attachment')->getClientOriginalName();
                    $path = $request->file('attachment')->storeAs('public', $fileName);
                    $invoice->update(['attachment' => $path]);
                }
                $invoice->update($validatedData);
            }
            $poitem = PoItems::find($poItem_id);
            if ($poitem) {
                $poitem->update([
                    "job_id" => $jobs_id,
                    "ponumber" => $request->purchase_order,
                    "description" => $request->description,
                    "job_details" => $request->job_details,
                    "price" => $request->amount,
                    "invoice_id" => $invoice->id,
                ]);
            }
            return redirect()->back()->with('go_back', true)->with('success', 'Invoice updated successfully.');
        }
        if ($request->input('action') == 'paid') {
            $validatedData['status'] = 3;
            $poItem = PoItems::find($poItem_id);
            $invoice = Invoice::find($poItem->invoice_id);
            if ($invoice) {
                $invoice->update($validatedData);
            }
            return redirect()->back()->with('go_back', true)->with('success', 'Customer Successfully Received Payment.');
            // return redirect()->back()->with('success', 'Customer Successfully Received Payment.');
        }

        if ($request->input('action') == 'delete') {
            $poItem = PoItems::find($poItem_id);
            $invoice = Invoice::find($poItem->invoice_id);

            if ($invoice) {
                $invoice->delete();
                return redirect()->back()->with('go_back', true)->with('success', 'Invoice deleted successfully.');
                // return redirect()->back()->with('success', 'Invoice deleted successfully.');
            }
            if ($poItem) {
                $poItem->update([
                    "ponumber" => null,
                    "description" => null,
                    "job_details" => null,
                    "price" => null,
                    "invoice_id" => null,
                ]);
            }

            return redirect()->back()->with('error', 'Invoice not found.');
        }
    }

    public function manual_invoice(Request $request, $id)
    {
        $customers = Customer::all()->where('user_id', $request->user()->id);
        $admin_builders = BuilderModel::all();

        $invoice = Invoice::where('id', $id)->first();
        $invoicePaymentHistorys = InvoicePayment::where('invoice_id', $id)->orderBy('id', 'asc')->get();
        $totalAmountMain = InvoicePayment::where('invoice_id', $id)->sum('amount_main');





        return view('new_shop.invoice.send_manual_invoices', compact('customers', 'admin_builders', 'invoice', 'invoicePaymentHistorys', 'totalAmountMain'));
    }


    public function manual_invoice_store(Request $request, $invoice_id)
    {
        $user_id = $request->user()->id;
        $validatedData = $request->validate([
            'user_id' => 'nullable|string',
            'customer_id' => 'nullable|string',
            'send_email' => 'required|email',
            'inv_number' => 'required|string',
            'date' => 'required|date',
            'purchase_order' => 'nullable|string',
            'job_id' => 'nullable|string',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'job_details' => 'nullable|string',
            'amount' => 'required|numeric',
            'gst' => 'required|numeric',
            'total_due' => 'required|numeric',
            'status' => 'required|numeric',
        ]);
        $validatedData['user_id'] = $user_id;

        if ($request->input('action') == 'send') {

            $painterUser = $request->user();
            $user = User::find($painterUser->id);
            $company_name = $user->company_name;
            $user_address = $user->address;
            $user_name = $user->first_name;
            $user_phone = $user->phone;
            $user_abn = $user->abn;
            // Prepare data for the PDF
            $data = [
                'user_id' => $request->user()->id,
                'company_name' => $company_name,
                'user_address' => $user_address,
                'user_name' =>  $user_name,
                'user_phone' =>  $user_phone,
                'abn' => $user_abn,
                'customer_id' => $request->customer_id,
                'send_email' => $request->send_email,
                'inv_number' =>  $request->inv_number,
                'date' =>  $request->date,
                'purchase_order' =>  $request->purchase_order,
                'job_id' =>  $request->job_id,
                'description' =>   $request->description,
                'address' =>  $request->address,
                'job_details' =>  $request->job_details,
                'amount' =>  $request->amount,
                'gst' =>  $request->gst,
                'total_due' =>  $request->total_due,
                'status' =>  $request->status,
                'batch' => $request->batch,
            ];

            try {


                $pdf = PDF::loadView('new_shop.invoice.invices_pdf', $data);
                $attachmentPath = null;
                if ($request->status !== 2) {
                    $validatedData = $request->validate([
                        'status' => 'required|numeric',
                    ]);

                    $validatedData['status'] = 2;
                    $validatedData['send_to'] = Carbon::now()->format('d-m-Y H:i:s');

                    $invoice = Invoice::find($invoice_id);
                    if ($invoice) {
                        $invoice->update($validatedData);
                    }
                    if ($request->hasFile('attachment')) {
                        $file = $request->file('attachment');
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $attachmentPath = $file->storeAs('', $fileName, 'public');
                        $validatedData['attachment'] = $attachmentPath;
                    }
                    // $invoice = Invoice::create($validatedData);
                }
                Mail::send('new_shop.invoice.invoice_mess', ['data' => $data, 'attachmentPath' => $attachmentPath,  'company_name' => $company_name, 'username' => $user_name], function ($message) use ($data, $pdf, $attachmentPath) {
                    $message->to($data["send_email"])
                        ->subject("Your Invoice - " . $data['address'])
                        ->attachData($pdf->output(), "invoice.pdf");
                    if ($attachmentPath) {
                        $fullPath = public_path('uploads/' . $attachmentPath);
                        $message->attach($fullPath);
                    }
                });

                // Mail::send('new_shop.invoice.invoice_mess', ['data' => $data, 'attachmentPath' => $attachmentPath, 'customSentence' => 'Your custom sentence here'], function ($message) use ($data,  $attachmentPath) {
                //     $message->to($data["send_email"])
                //         ->subject("Your Invoice - " . $data['address']);
                //     // ->attachData($pdf->output(), "invoice.pdf");
                //     if ($attachmentPath) {
                //         $fullPath = public_path('uploads/' . $attachmentPath);
                //         $message->attach($fullPath);
                //     }
                // });


                // Redirect with success message
                return redirect()->back()->with('go_back', true)->with('success', 'Invoice Send to Email successfully.');
            } catch (\Exception $e) {
                // Handle the exception
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }


        if ($request->input('action') == 'update') {
            $invoice = Invoice::find($invoice_id);
            if ($invoice) {

                $validatedData['status'] = 1;

                if ($request->hasFile('attachment')) {
                    $fileName = time() . '_' . $request->file('attachment')->getClientOriginalName();
                    $path = $request->file('attachment')->storeAs('public', $fileName);
                    $invoice->update(['attachment' => $path]);
                }
                $invoice->update($validatedData);
                // No need to update the invoice again, it's already updated
                return redirect()->route('invoices_all')->with('go_back', true)->with('success', 'Invoice updated successfully.');
            }
        }
        if ($request->input('action') == 'paid') {
            $validatedData = $request->validate([
                'status' => 'required|numeric',
            ]);
            $validatedData['status'] = 3;

            $invoice = Invoice::find($invoice_id);
            if ($invoice) {
                $invoice->update($validatedData);
            }
            return redirect()->route('invoices_all')->with('go_back', true)->with('success', 'Customer Paid Successfully .');
        }

        if ($request->input('action') == 'delete') {
            $invoice = Invoice::find($invoice_id);

            if ($invoice) {
                $invoice->delete();
                return redirect()->route('invoices_all')->with('success', 'Invoice deleted successfully.');
            }

            return redirect()->back()->with('error', 'Invoice not found.');
        }
    }



    public function late(Request $request)
    {
        $user_id = $request->user()->id;
        $today = now();

        // Adjusted query for admin builders
        $admin_builders = BuilderModel::select('id', 'company_name', 'builder_email as email', 'phone_number as mobile', 'address as billingAddress', 'abn', 'gate', 'schedule')
            ->get();

        $customers = Customer::where('user_id', $user_id)
            ->select('id', 'companyName as company_name', 'email', 'mobile', 'billingAddress', 'abn', 'gst as gate', 'schedule')
            ->get();

        $results = $customers->merge($admin_builders)->unique('id');

        $lateInvoices = collect();

        foreach ($results as $customer) {
            // Fetching invoices for each customer
            $customerInvoices = Invoice::where('customer_id', $customer->company_name)
                ->where('status', 2)
                ->where('user_id', $user_id)
                ->orderBy('updated_at', 'desc')
                ->get();

            foreach ($customerInvoices as $invoice) {

                $lateDate = Carbon::parse($invoice->send_to)->addDays($customer->schedule);
                if ($today->gt($lateDate)) {

                    $lateInvoices->push($invoice);
                }
            }
        }

        // Remove duplicates from the lateInvoices collection, based on a unique identifier like 'id'
        $lateInvoices = $lateInvoices->unique('id');

        return view('new_shop.invoice.late_invices', compact('lateInvoices', 'results'));
    }





    public function invoices_all(Request $request)
    {
        $user_id = $request->user()->id;

        $invoices = Invoice::where('user_id', $user_id)
            ->orderBy('updated_at', 'desc')
            ->get();
        $inv_numbers = Invoice::max('id') ?? 0;
        $today = now();
        $fiveDaysAgo = $today->subDays(3);
        $due_invoice = Invoice::where('user_id', $user_id)
            ->where('status', 2)
            ->whereDate('send_to', '>', $fiveDaysAgo)
            ->orderBy('updated_at', 'desc')
            ->count();
        return view('new_shop.invoice.main_invices', compact('invoices', 'due_invoice', 'inv_numbers'));
    }


    public function report(Request $request)
    {
        $lateInvoices = 25;
        return view('new_shop.invoice.invices_report', compact('lateInvoices'));
    }
    public function invoicePayment(Request $request)
    {

        $amountMain = floatval($request->input('amount_main', 0));
        $parentAmount = floatval($request->input('parent_amount', 0));
        $remainingAmount = max(0,  $parentAmount - $amountMain);
        $user_id = $request->user()->id;
        $currentDateTime = now();
        $invoicePayment = new InvoicePayment();
        $invoicePayment->user_id = $user_id;
        $invoicePayment->invoice_id = $request->invoice_id;
        $invoicePayment->amount_main = $request->amount_main;
        $invoicePayment->parent_amount = $request->parent_amount;
        $invoicePayment->remaning_amount = $remainingAmount;
        $invoicePayment->notes = $request->notes;
        $invoicePayment->date = $currentDateTime;
        $invoicePayment->save();

        return response()->json([
            'success' => true,
            'invoiceId' => $invoicePayment->id,
            'amount' => $invoicePayment->amount,
            'notes' => $invoicePayment->notes,
            'message' => 'Customer added successfully!'
        ]);
    }
}
