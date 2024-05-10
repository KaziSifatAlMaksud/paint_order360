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
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use App\Mail\InvoiceMail;

use DateTime;

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
                $attachmentPath1 = null;
                $attachmentPath2 = null;
                if ($request->hasFile('attachment')) {
                    $file = $request->file('attachment');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $attachmentPath = $file->storeAs('', $fileName, 'public');
                    $validatedData['attachment'] = $attachmentPath;
                }

                if ($request->hasFile('attachment1')) {
                    $file1 = $request->file('attachment1');
                    $fileName1 = time() . '_' . $file1->getClientOriginalName();
                    $attachmentPath1 = $file1->storeAs('', $fileName1, 'public');
                    $validatedData['attachment1'] = $attachmentPath1;
                   
                }

                if ($request->hasFile('attachment2')) {
                    $file2 = $request->file('attachment2');
                    $fileName2 = time() . '_' . $file2->getClientOriginalName();
                    $attachmentPath2 = $file2->storeAs('', $fileName2, 'public');
                    $validatedData['attachment2'] = $attachmentPath2;
            }
                Mail::send('new_shop.invoice.invoice_mess', ['data' => $data, 'attachmentPath' => $attachmentPath, 'attachmentPath1' => $attachmentPath1, 'attachmentPath2' => $attachmentPath2,  'company_name' => $company_name, 'username' => $user_name], function ($message) use ($data, $pdf, $attachmentPath,$attachmentPath1,$attachmentPath2 ) {
                    $message->to($data["send_email"])
                        ->subject("Your Invoice - " . $data['address'])
                        ->attachData($pdf->output(), "invoice.pdf");
                   if ($attachmentPath) {
                    $fullPath = public_path('uploads/' . $attachmentPath);
                    $message->attach($fullPath);
                    }
                    if ($attachmentPath1) {
                        $fullPath1 = public_path('uploads/' . $attachmentPath1);
                        $message->attach($fullPath1);
                    }
                    if ($attachmentPath2) {
                        $fullPath2 = public_path('uploads/' . $attachmentPath2);
                        $message->attach($fullPath2);
                    }
                });
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
            if ($request->hasFile('attachment1')) {
                $fileName = time() . '_' . $request->file('attachment1')->getClientOriginalName();
                $validatedData['attachment1'] = $request->file('attachment1')->storeAs('', $fileName, 'public');
            }

            // Check and store the third attachment
            if ($request->hasFile('attachment2')) {
                $fileName = time() . '_' . $request->file('attachment2')->getClientOriginalName();
                $validatedData['attachment2'] = $request->file('attachment2')->storeAs('', $fileName, 'public');
            }
            $invoice = Invoice::create($validatedData);
            return redirect()->back()->with('go_back', true)->with('success', 'Invoice created successfully.');
        }
    }

    // public function send_statement_by_id(Request $request)
    // {
    //     $customer_id = $request->input('customer_id');
    //     $invoices = Invoice::with('invoicePayments', 'customer')->where('customer_id', $customer_id)
    //         ->where('status', 2)
    //         ->where('user_id', $request->user()->id)
    //         ->get();
    //     return response()->json($invoices);
    // }

    public function send_statement_by_id(Request $request)
    {
        $today = now();
        $customer_id = $request->input('customer_id');
        $invoices = Invoice::with('invoicePayments', 'customer')
            ->where('customer_id', $customer_id)
            ->where('status', 2)
            ->where('user_id', $request->user()->id)
            ->get();
        $user_id = $request->user()->id;
        $admin_builders = BuilderModel::select('id', 'company_name', 'builder_email as email', 'phone_number as mobile', 'address as billingAddress', 'abn', 'gate', 'schedule')->get();
        $customers = Customer::where('user_id', $user_id)->select('id', 'companyName as company_name', 'email', 'mobile', 'billingAddress', 'abn', 'gst as gate', 'schedule')->get();

        $results = $customers->merge($admin_builders)->unique('id');

        $invoicesWithLateAttribute = [];

        foreach ($invoices as $invoice) {
            $sendDate = new DateTime($invoice->send_to);
            $customerFound = false;
            $isLate = true;

            foreach ($results as $customer) {
                if ($invoice->customer_id === $customer->company_name) {
                    $customerFound = true;
                    $lateDate = Carbon::parse($invoice->send_to)->addDays($customer->schedule);
                    if ($today->gt($lateDate)) {
                        $isLate = true;
                    } else {
                        $isLate = false;
                    }
                    break;
                }
            }
            if (!$customerFound) {
                $isLate = false;
            }

            // Convert Invoice object to array, add isLate attribute, and then convert back to object
            $invoiceArray = $invoice->toArray();
            $invoiceArray['isLate'] = $isLate;
            $invoicesWithLateAttribute[] = (object) $invoiceArray;
        }

        return response()->json(['invoices' => $invoicesWithLateAttribute]);
    }





    public function invoice_send(Request $request, $jobs_id, $poItem_id)
    {
        $customers = Customer::all()->where('user_id', $request->user()->id);
        $jobs = PainterJob::with('superviser', 'poitem', 'painter', 'admin_builders', 'assignedJob')
            ->where('id', $jobs_id)
            // ->where('user_id', $request->user()->id)
            ->whereNull('parent_id')
            ->first();
        if (isset($jobs->admin_builders)) {
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

    public function send_statement(Request $request)
    {
        $user_id = $request->user()->id;

        $invoices = Invoice::with('invoicePayments')
            ->where('status', 2)
            ->where('user_id', $user_id)
            ->orderBy('updated_at', 'desc')
            ->get();
        foreach ($invoices as $invoice) {
            // Calculate the sum of amount_main for each invoice's payments
            $invoice->total_payments = $invoice->invoicePayments->sum('amount_main');
        }
        $invoiceSums = DB::table('invoices')
            ->select('customer_id', DB::raw('SUM(total_due) as total_price'), 'send_email')
            ->where('status', 2)
            ->where('user_id', $user_id)
            ->groupBy('customer_id')
            ->get();


        $inv_numbers = Invoice::max('id') ?? 0;
        $today = now();
        $fiveDaysAgo = $today->subDays(3);
        $due_invoice = Invoice::where('user_id', $user_id)
            ->where('status', 2)
            ->whereDate('send_to', '>', $fiveDaysAgo)
            ->orderBy('updated_at', 'desc')
            ->count();
        return view('new_shop.invoice.send_statement', compact('invoices', 'due_invoice', 'invoiceSums', 'inv_numbers'));
    }

    public function send_statement_detail(Request $request)
    {
        $user_id = $request->user()->id;

        $invoices = Invoice::where('user_id', $user_id)
            ->orderBy('updated_at', 'desc')
            ->get();
        $invoiceSums = DB::table('invoices')
            ->select('customer_id', DB::raw('SUM(total_due) as total_price'))
            ->where('user_id', $user_id)
            ->groupBy('customer_id')
            ->get();

        $customers = DB::table('invoices')
            ->select('customer_id', 'send_email')
            ->where('user_id', $user_id)
            ->groupBy('customer_id')
            ->get();

        $inv_numbers = Invoice::max('id') ?? 0;
        $today = now();
        $fiveDaysAgo = $today->subDays(3);
        $due_invoice = Invoice::where('user_id', $user_id)
            ->where('status', 2)
            ->whereDate('send_to', '>', $fiveDaysAgo)
            ->orderBy('updated_at', 'desc')
            ->count();
        return view('new_shop.invoice.send_statement_details', compact('invoices', 'due_invoice', 'customers', 'invoiceSums', 'inv_numbers'));
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
        if ($request->input('action') == 'send') {

            $painterUser = $request->user();
            $user = User::find($painterUser->id);
            $company_name = $user->company_name;
            $user_address = $user->address;
            $user_name = $user->first_name;
            $user_phone = $user->phone;
            $user_abn = $user->abn;

            $attachmentPaths = [];

             // Initialize attachment paths
             $attachmentPath = $attachmentPath1 = $attachmentPath2 = null;

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

                    
          foreach (['attachment', 'attachment1', 'attachment2'] as $key => $fileKey) {
                if ($request->hasFile($fileKey)) {
                    $file = $request->file($fileKey);
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $attachmentPath[$key] = $file->storeAs('', $fileName, 'public');
                    $validatedData[$fileKey] = $attachmentPats[$key];
                } else {
                    $attachmentPath[$key] = null; // Ensure every index is initialized
                }
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
                Mail::send('new_shop.invoice.invoice_mess', [
                'data' => $data,
                'attachmentPath' => $attachmentPath,
                'attachmentPath1' => $attachmentPath1,
                'attachmentPath2' => $attachmentPath2,
                'company_name' => $company_name,
                'user_name' => $user_name
                ], function ($message) use ($data, $pdf, $attachmentPath, $attachmentPath1, $attachmentPath2) {



                    $message->to($data["send_email"])
                        ->subject("Your Invoice - " . $data['address'])
                        ->attachData($pdf->output(), "invoice.pdf");
                        
                    
                    foreach ($attachmentPaths as $index => $path) {
                    if ($path) {
                    $fullPath = public_path('uploads/' . $path);
                    $message->attach($fullPath);
                    }
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
                    $path = $request->file('attachment')->storeAs('', $fileName, 'public');
                    $invoice->update(['attachment' => $path]);
                }
                 if ($request->hasFile('attachment1')) {
                 $fileName = time() . '_' . $request->file('attachment1')->getClientOriginalName();
                 $path = $request->file('attachment1')->storeAs('', $fileName, 'public');

                 $invoice->update(['attachment1' => $path]);

                 }
                   if ($request->hasFile('attachment2')) {
                   $fileName = time() . '_' . $request->file('attachment2')->getClientOriginalName();
                   $path = $request->file('attachment2')->storeAs('', $fileName, 'public');

                   $invoice->update(['attachment2' => $path]);
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
            if ($poItem) {
                $poItem->update([
                    "ponumber" => null,
                    "file" => null,
                    "ponumber" => null,
                    "description" => null,
                    "job_details" => null,
                    "price" => null,
                ]);
            }
            if ($invoice) {
                 $invoice->delete();

                $invoice->update([
                    "amount" => 0.00,
                    "gst" => 0.00,
                    "total_due" => 0.00,
                    "description" => null,
                    "send_to" => null,
                    "attachment" => null,
                    "attachment1" => null,
                    "attachment2" => null,
                    "purchase_order" => null,
                ]);

                return redirect()->back()->with('go_back', true)->with('success', 'Invoice deleted successfully.');
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
              'user_name' => $user_name,
              'user_phone' => $user_phone,
              'abn' => $user_abn,
              'customer_id' => $request->customer_id,
              'send_email' => $request->send_email,
              'inv_number' => $request->inv_number,
              'date' => $request->date,
              'purchase_order' => $request->purchase_order,
              'job_id' => $request->job_id,
              'description' => $request->description,
              'address' => $request->address,
              'job_details' => $request->job_details,
              'amount' => $request->amount,
              'gst' => $request->gst,
              'total_due' => $request->total_due,
              'status' => $request->status,
              'batch' => $request->batch,
              ];

              try {


              $pdf = PDF::loadView('new_shop.invoice.invices_pdf', $data);
              $attachmentPath = null;
              $attachmentPath1 = null;
              $attachmentPath2 = null;
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
            if ($request->hasFile('attachment1')) {
                    $file1 = $request->file('attachment1');
                    $fileName1 = time() . '_' . $file1->getClientOriginalName();
                    $attachmentPath1 = $file1->storeAs('', $fileName1, 'public');
                    $validatedData['attachment1'] = $attachmentPath1;
              
                }


          if ($request->hasFile('attachment2')) {
                $file2 = $request->file('attachment2');
                $fileName2 = time() . '_' . $file2->getClientOriginalName();
                $attachmentPath2 = $file2->storeAs('', $fileName2, 'public');
                $validatedData['attachment2'] = $attachmentPath2;
           
            }

              // $invoice = Invoice::create($validatedData);
              }
                Mail::send('new_shop.invoice.invoice_mess', ['data' => $data, 'attachmentPath' => $attachmentPath, 'attachmentPath1' => $attachmentPath1, 'attachmentPath2' => $attachmentPath2,  'company_name' => $company_name, 'username' => $user_name], function ($message) use ($data, $pdf, $attachmentPath,$attachmentPath1,$attachmentPath2 ) {
                    $message->to($data["send_email"])
                        ->subject("Your Invoice - " . $data['address'])
                        ->attachData($pdf->output(), "invoice.pdf");
                   if ($attachmentPath) {
                    $fullPath = public_path('uploads/' . $attachmentPath);
                    $message->attach($fullPath);
                    }
                    if ($attachmentPath1) {
                        $fullPath1 = public_path('uploads/' . $attachmentPath1);
                        $message->attach($fullPath1);
                    }
                    if ($attachmentPath2) {
                        $fullPath2 = public_path('uploads/' . $attachmentPath2);
                        $message->attach($fullPath2);
                    }
                });

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
                 $file = $request->file('attachment');
                 $fileName = time() . '_' . $file->getClientOriginalName();
                 $attachmentPath = $file->storeAs('', $fileName, 'public');
                 $validatedData['attachment'] = $attachmentPath;
              }
               if ($request->hasFile('attachment1')) {
                    $file1 = $request->file('attachment1');
                    $fileName1 = time() . '_' . $file1->getClientOriginalName();
                    $attachmentPath1 = $file1->storeAs('', $fileName1, 'public');
                    $validatedData['attachment1'] = $attachmentPath1;
                  
                }
            if ($request->hasFile('attachment2')) {
                $file2 = $request->file('attachment2');
                $fileName2 = time() . '_' . $file2->getClientOriginalName();
                $attachmentPath2 = $file2->storeAs('', $fileName2, 'public');
                $validatedData['attachment2'] = $attachmentPath2;
           
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



        $inv_numbers = Invoice::max('id') ?? 0;
        $today = now();
        $fiveDaysAgo = $today->subDays(3);
        $due_invoice = Invoice::where('user_id', $user_id)
            ->where('status', 2)
            ->whereDate('send_to', '>', $fiveDaysAgo)
            ->orderBy('updated_at', 'desc')
            ->count();

        $read_invoice_total = Invoice::where('user_id', $user_id)
            ->where('status', 1)
            ->sum('total_due');
        $send_invoice_total = Invoice::where('user_id', $user_id)
            ->where('status', 2)
            ->sum('total_due');
        $today =  Carbon::now();
        $user_id = $request->user()->id;
        $lateInvoices = collect();
        $totalLateInvoicesAmount = 0;

        // Fetch data from admin_builders and customers
        $admin_builders = BuilderModel::select('id', 'company_name', 'builder_email as email', 'phone_number as mobile', 'address as billingAddress', 'abn', 'gate', 'schedule')->get();
        $customers = Customer::where('user_id', $user_id)->select('id', 'companyName as company_name', 'email', 'mobile', 'billingAddress', 'abn', 'gst as gate', 'schedule')->get();

        // Combine results from admin_builders and customers
        $results = $customers->merge($admin_builders)->unique('id');

        $invoices = Invoice::where('user_id', $user_id)
            ->where('amount', '>', 0.00)
            ->orderBy('updated_at', 'desc')
            ->get();
        foreach ($invoices as $invoice) {
            if ($invoice->status == 2) { // Assuming status 2 signifies a particular condition
                foreach ($results as $customer) {
                    if ($customer->company_name == $invoice->customer_id) {
                        $dueDate = Carbon::parse($invoice->send_to)->addDays($customer->schedule);
                        if ($today->gt($dueDate)) {
                            if (!$lateInvoices->contains('id', $invoice->id)) {
                                $lateInvoices->push($invoice);
                                $totalLateInvoicesAmount += $invoice->total_due;
                            }
                            break;
                        }
                    }
                }
            }
        }
        $totalLateInvoices = $lateInvoices->count();

        $ready_invoice_count =  Invoice::where('user_id', $user_id)
            ->where('status', 1)->where('amount', '>', 0.00)->count();
        $send_invoice_count =  Invoice::where('user_id', $user_id)
            ->where('status', 2)->where('amount', '>', 0.00)->count();
        $paid_invoice_count =  Invoice::where('user_id', $user_id)
            ->where('status', 3)->where('amount', '>', 0.00)->count();
        return view('new_shop.invoice.main_invices', compact('invoices', 'due_invoice', 'inv_numbers', 'read_invoice_total', 'send_invoice_total',  'ready_invoice_count', 'send_invoice_count', 'totalLateInvoices', 'totalLateInvoicesAmount'));
    }


    public function report(Request $request)
    {
        $user_id = $request->user()->id;

        // $jobs = PainterJob::with('assignedJob')->where('user_id', $user_id)->distinct()->whereNull('parent_id')->get();

        $jobs = PainterJob::with('assignedJob')
            // ->where('user_id', $request->user()->id)
            ->where(function ($query) use ($user_id) {
                $query->where('user_id', $user_id)
                    ->orWhere('assign_painter', $user_id);
            })->distinct()
            ->whereNull('parent_id')
            ->get();
        $jobsCount = $jobs->count();
        $totalPrice = 0;
        $totalPaintCost = 0;

        foreach ($jobs as $job) {
            $totalPrice += $job->price;
        }

        $invoices = Invoice::with('invoicePayments')
            ->where('user_id', $user_id)
            ->where('status', 3)
            ->orderBy('updated_at', 'desc')
            ->get();
        foreach ($invoices as $invoice) {
            // Calculate the sum of amount_main for each invoice's payments
            $invoice->total_payments = $invoice->invoicePayments->sum('amount_main');
        }

        $invoiceSums = DB::table('invoices')
            ->select('customer_id', DB::raw('SUM(total_due) as total_price'), 'send_email')
            ->where('status', 3)
            ->where('user_id', $user_id)
            ->whereNotNull('customer_id') // Exclude records where customer_id is null
            ->groupBy('customer_id')
            ->get();



        $inv_numbers = Invoice::max('id') ?? 0;
        $today = now();
        $fiveDaysAgo = $today->subDays(3);
        $due_invoice = Invoice::where('user_id', $user_id)
            ->where('status', 2)
            ->whereDate('send_to', '>', $fiveDaysAgo)
            ->orderBy('updated_at', 'desc')
            ->count();


        return view('new_shop.invoice.invices_report', compact('invoices', 'totalPrice', 'jobs', 'jobsCount', 'due_invoice', 'invoiceSums', 'inv_numbers'));
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'email' => 'required|email',
        ]);

        $customer_id = $request->input('customer_id');
        // $email = $request->input('email');
        // $user_email = $request->user()->email;
        $email = "2019-3-60-050@std.ewubd.edu";
        $user_email = "kazi.sifat2013@gmail.com";
        $today = now();
        $customer_id = $request->input('customer_id');
        $invoices = Invoice::with('invoicePayments', 'customer')
            ->where('customer_id', $customer_id)
            ->where('status', 2)
            ->where('user_id', $request->user()->id)
            ->get();

        $user_id = $request->user()->id;
        $admin_builders = BuilderModel::select('id', 'company_name', 'builder_email as email', 'phone_number as mobile', 'address as billingAddress', 'abn', 'gate', 'schedule')->get();
        $customers = Customer::where('user_id', $user_id)->select('id', 'companyName as company_name', 'email', 'mobile', 'billingAddress', 'abn', 'gst as gate', 'schedule')->get();

        $results = $customers->merge($admin_builders)->unique('id');

        $invoicesWithLateAttribute = [];

        foreach ($invoices as $invoice) {

            $customerFound = false;
            $isLate = true;

            foreach ($results as $customer) {
                if ($invoice->customer_id === $customer->company_name) {
                    $customerFound = true;
                    $lateDate = Carbon::parse($invoice->send_to)->addDays($customer->schedule);
                    if ($today->gt($lateDate)) {
                        $isLate = true;
                    } else {
                        $isLate = false;
                    }
                    break;
                }
            }
            if (!$customerFound) {
                $isLate = false;
            }

            // Dynamically add a property 'isLate' to the invoice object
            $invoice->setAttribute('isLate', $isLate);

            $invoicesWithLateAttribute[] = $invoice;
        }

        if ($invoices->isEmpty()) {
            return response()->json(['message' => 'No invoices found for this customer.'], 404);
        }

        $pdf = PDF::loadView('new_shop.invoice.outstanding_pdf', ['invoices' => $invoicesWithLateAttribute]);
        $pdfOutput = $pdf->output();

        try {
            Mail::raw('Please find your List of outstanding report attached.', function ($message) use ($email, $pdfOutput) {
                $message->to($email)
                    ->subject("Your Outstanding Report")
                    ->attachData($pdfOutput, "Outstanding-invoices.pdf", [
                        'mime' => 'application/pdf',
                    ]);
            });

            Mail::raw('Please find the attached outstanding report for the customer.', function ($message) use ($user_email, $pdfOutput) {
                $message->to($user_email)
                    ->subject("Customer Outstanding Report")
                    ->attachData($pdfOutput, "Outstanding-invoices.pdf", [
                        'mime' => 'application/pdf',
                    ]);
            });

            return redirect()->back()->with('go_back', true)->with('success', 'Outstanding Statement Sent to Email Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('go_back', true)->with('error', 'Failed to send email: ' . $e->getMessage());
        }
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


    public function price_data(Request $request)
    {
        $user_id = $request->user()->id;
        $invoices = Invoice::where('user_id', $user_id)->get();

        // Start HTML string
        $html = '';

        foreach ($invoices as $invoice) {

            $html .= "<tr>
                    <td>{$invoice->address}</td>
                    <td align='center'>\${$invoice->amount}</td>
                    <td>{$invoice->labour}</td>
                    <td>{$invoice->total_due}</td>
                  </tr>";
        }

        return response()->json(['html' => $html]);
    }


    // ... other controller methods ...

    public function filterInvoices(Request $request)
    {
        $user_id = $request->user()->id;
        $dateRange = $request->query('dateRange');
        $year = $request->query('year');
        $quarters = [
            'Q1' => ['01', '03'],
            'Q2' => ['04', '06'],
            'Q3' => ['07', '09'],
            'Q4' => ['10', '12'],
        ];

        if (array_key_exists($dateRange, $quarters)) {
            $startDate = "{$year}-{$quarters[$dateRange][0]}-01";
            $endDate = "{$year}-{$quarters[$dateRange][1]}-" . cal_days_in_month(CAL_GREGORIAN, (int)$quarters[$dateRange][1], (int)$year);

            $invoiceSumas = DB::table('invoices')
                ->select('customer_id', DB::raw('SUM(total_due) as total_price'))
                ->where('status', '=', 3)
                ->where('user_id', '=', $user_id)
                ->whereBetween('date', [$startDate, $endDate])
                ->whereNotNull('customer_id')
                ->groupBy('customer_id')
                ->get();
        } else {
            $invoiceSumas = DB::table('invoices')
                ->select('customer_id', DB::raw('SUM(total_due) as total_price'))
                ->where('status', '=', 3)
                ->where('user_id', '=', $user_id)
                ->whereNotNull('customer_id')
                ->groupBy('customer_id')
                ->get();
        }

        // Return the data as JSON
        return response()->json(['invoiceSumas' => $invoiceSumas]);
    }

        public function filterCustomer(Request $request)
        {
        // Retrieve the user ID from the authenticated user
        $user_id = $request->user()->id;

        // Retrieve the year from the query parameters
        $year = $request->query('year');
        if (is_numeric($year) && strlen($year) == 4) {
        $startDate = "{$year}-01-01";
        $endDate = "{$year}-12-31";
        } else {
        // Return a JSON response with a 400 status code for bad request
        return response()->json(['error' => 'Invalid year format'], 400);
        }

        // Use Laravel's logging system to log the start and end dates if needed
        \Log::info('Start Date: ' . $startDate);
        \Log::info('End Date: ' . $endDate);

        // Retrieve customer invoice sums filtered by year
        $invoiceSumas = DB::table('invoices')
        ->select('customer_id', DB::raw('SUM(total_due) as total_price'))
        ->where('status', '=', 3)
        ->where('user_id', '=', $user_id)
        ->whereBetween('date', [$startDate, $endDate])
        ->whereNotNull('customer_id')
        ->groupBy('customer_id')
        ->get();

        // Return the data as JSON
        return response()->json(['invoiceCustomerSumas' => $invoiceSumas]);
        }




     public function attachmentdelete(Request $request)
     {
        $invoice = Invoice::find($request->invoice_id);
        $field = $request->attachment_field;
        $allowedFields = ['attachment', 'attachment1', 'attachment2'];
        if (!in_array($field, $allowedFields)) {
             return response()->json(['success' => false, 'message' => 'Invalid field name'], 400);
        }
        if ($invoice && $invoice->$field) {
      
            Storage::disk('public')->delete($invoice->$field);
            $invoice->$field = null; // Set the field to null after deleting the file
            $invoice->save(); // Save the invoice record with the updated field
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'No such invoice or field is empty'], 404);
     }




        public function pdf()
        {
            $customer_id = "Gj Gardener";
            $invoices = Invoice::where('customer_id', $customer_id)
                ->where('user_id', 25)
                ->get();



            return view('new_shop.invoice.outstanding_pdf', compact('invoices')); // Assuming 'pdf.view' is the name of your view file
        }
}
