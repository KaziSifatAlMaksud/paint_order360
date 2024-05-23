<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\Shop;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\PjItem;
use App\Models\Builder;
use App\Models\PoItems;
use App\Models\PoItem;
use App\Models\Invoice;
use Carbon\Carbon;
use App\Models\PainterJob;
use App\Models\Superviser;
use App\Models\BuilderModel;
use App\Models\AssignedPainterJob;
use App\Models\AllowNotification;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class PainterJobController extends Controller
{
    private $outside = [
        'eaves' => 'Eaves',
        'downpipes' => 'Downpipes',
        'meter_box' => 'Meter box',
        'front_door' => 'Front door',
        'laundry_door' => 'Laundry door',
        'balcony_door' => 'Balcony door',
        'garage_door' => 'Garage door',
        'main_render' => 'Balcony door',
        'main_render' => 'Main Render',
        'render_2' => 'Render 2',
        'render_3' => 'Render 3',
        'Main_cladding' => 'Main Cladding',
        'cladding_2' => 'Cladding 2',
        'cladding_3' => 'Cladding 3',
        'moroka_finish' => 'Moroka finish',
        'moroka_undercoat' => 'Moroka undercoat',
        'columns' => 'Columns',
        'timber_posts' => 'Timber Posts',
        'timber_beam' => 'Timber Beam',
        'timber_window' => 'Timber Window',
        'fascia' => 'Fascia',
        'leter_box' => 'Leter box',
        'flashing' => 'Fashing',
        'z_flashing' => 'Z Flashing',
        // 'Extra_1' => 'Extra_1',
        // 'Extra_2' => 'Extra_2',
        // 'Extra_3' => 'Extra_3',
        // 'Extra_4' => 'Extra_4',
        // 'Extra_5' => 'Extra_5',
    ];

    private $inside = [
        'ceilings' => 'Ceilings',
        'walls' => 'Walls',
        'wall_undercoat' => 'Wall undar coat',
        'woodwork_colour' => 'Woodwork colour',
        'woodwork_undercoat' => 'Woodwork undercoat',
        'feature_room1' => 'Feature room 1',
        'feature_room2' => 'Feature room 2',
        '1st_feature_wall' => '1st Feature wall',
        '2st_feature_wall' => '2st Feature wall',
        '3st_feature_wall' => '3st Feature wall',
        'stringer' => 'Stringer',
        'handrail' => 'Handrail',
        'post' => 'Post',
        'tread' => 'Tread',
        'riser' => 'Riser',
        'other' => 'Other',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = PainterJob::with(['painter', 'superviser']);

        if ($request->painter) {
            $query->where('user_id', $request->painter);
        }

        $jobs = $query->get();

        return view('admin.painter_jobs.index', ['jobs' => $jobs]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assign_painter = null;
        $painterJob = new PainterJob();
        // $buliders =  Builder::whereNotNull('name')->orderBy('name')->get();
        $data['inside'] = [];
        $data['outside'] = [];
        $brands = Brand::all();
        $order = Order::all();
        $admin_buliders = BuilderModel::all();
        $supervisors = Superviser::all();
        $users = User::whereNotNull('first_name')->orderBy('first_name')->get();
        return view('admin.painter_jobs.add', [
            'data' => $data, 'users' => $users, 'supervisors' => $supervisors, 'order' => $order, 'brands' => $brands, 'admin_buliders' => $admin_buliders, 'painterjob' => $painterJob,
            // 'buliders' => $buliders, 
            'assign_painter' => $assign_painter,
            'outside' => $this->outside, 'inside' => $this->inside
        ]);
    }

    public function order_details()
    {
        $assign_painter = null;
        $painterJob = new PainterJob();
        // $buliders =  Builder::whereNotNull('name')->orderBy('name')->get();
        $data['inside'] = [];
        $data['outside'] = [];
        $brands = Brand::all();
        $order = Order::all();
        $admin_buliders = BuilderModel::all();
        $supervisors = Superviser::all();
        $users = User::whereNotNull('first_name')->orderBy('first_name')->get();
        return view('shop.order_details', [
            'data' => $data, 'users' => $users, 'supervisors' => $supervisors, 'order' => $order, 'brands' => $brands, 'admin_buliders' => $admin_buliders, 'painterjob' => $painterJob,
            // 'buliders' => $buliders, 
            'assign_painter' => $assign_painter,
            'outside' => $this->outside, 'inside' => $this->inside
        ]);
    }


    public function delete($id)
    {
        $job = PainterJob::find($id);
        $job->delete();
        return redirect()->route('main')->with('success', 'Job deleted successfully.');
    }

    public function acceptJob($id)
    {
        $Assjob = AssignedPainterJob::find($id);
        $Assjob->status = 2;
        $Assjob->save();
        return redirect()->back()->with('success', 'Job is Accepted Successfully.');
    }

    public function unassign($id)
    {
        $job = PainterJob::find($id);

        if ($job) {
            $job->assign_painter = null;
            $job->save();
        }
        $assign_job = AssignedPainterJob::where('job_id', $id)->first();

        $invoice = Invoice::where('job_id', $id)->whereNull('batch')->first();
        if ($invoice) {
            $invoice->delete();
        }


        if ($assign_job) {
            $assign_job->delete();
        }
        return redirect()->route('main')->with('success', 'Job unassigned successfully.');
    }

    public function finishjob($id)
    {
        $job = PainterJob::find($id);
        $job->status = 3;
        $job->save();
        return redirect()->route('main')->with('success', 'Job updated successfully.');
    }
    public function started($id)
    {
        $job = PainterJob::find($id);
        $job->status = 2;
        $job->save();
        return redirect()->route('main')->with('success', 'Job updated successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['status' => 1]);
        $painterjob = new PainterJob();
        $data = $request->only($painterjob->getFillable());
        $this->manageFile($request, 'po', $data, $painterjob);
        $this->manageFile($request, 'colors', $data, $painterjob);
        $this->manageFile($request, 'plan', $data, $painterjob);
        $this->manageFile($request, 'colors_secound', $data, $painterjob);
        $this->manageFile($request, 'colors_spec', $data, $painterjob);
        $this->manageFile($request, 'plan_granny', $data, $painterjob);
        if ($request->has('company_id')) {
            $painterjob->builder_id = $request->company_id;
        }
        if ($request->has('assigned_painter_name')) {
            $painterjob->assign_painter = $request->assigned_painter_name;
        }

        $user_id = $request->user_id;
        $mainPainterInfo = User::find($user_id); 
        $painterjob->fill($data)->save();
        if (!empty($request->assigned_painter_name) && !empty($request->assign_company_id) && !empty($request->assign_price_job)) {
            // if ($request->has('assigned_painter_name') && $request->has('assign_company_id')) {
            AssignedPainterJob::create([
                'assigned_painter_name' => $request->assigned_painter_name,
                'assign_company_id' => $request->assign_company_id,
                'assigned_supervisor' => $request->assigned_supervisor,
                'assign_price_job' => $request->assign_price_job,
                'assign_job_description' => $request->assign_job_description,
                'job_id' => $painterjob->id,
                'user_id' => $request->user_id,
            ]);


          

            //Email for Assign Painter ...

            $AssingPainterInfo = User::find($request->assigned_painter_name);  
            $jobInfo = PainterJob::find($AssingPainterInfo->job_id);   
    // Find the painter user
          
            $maxId = Invoice::max('id');
            $nextId = $maxId + 1;
            $maxInvoiceNumber = sprintf('INV: %04d', $nextId);
            $data = [
                'user_id' => $AssingPainterInfo->id,
                'customer_id' => $mainPainterInfo->company_name,
                'send_email' => $mainPainterInfo->email,
                'inv_number' => $maxInvoiceNumber,
                'date' => now()->toDateString(),
                'purchase_order' => null,
                'job_id' => $painterjob->id,
                'address' => $request->address,
                'description' => $request->assign_job_description,
                'attachment' => '',
                'job_details' => '',
                'amount' =>$request->assign_price_job - ($request->assign_price_job * 0.10),
                'gst' => $request->assign_price_job * 0.10,
                'total_due' =>$request->assign_price_job,
                'status' => 1,
            ];

            // Create the invoice
            $invoice = Invoice::create($data);
            // Return a JSON response
            $data = [
                'name' => $AssingPainterInfo->first_name . ' ' . $AssingPainterInfo->last_name,
                'address' => $request->address,
                'orderID' => 'Order360',
                'extrasMessage' => $request->builder_company_name,
                'price'  => $request->assign_price_job,
                'send_email' => $AssingPainterInfo->email,
            ];

            Mail::send('new_shop.invoice.jobnotification', $data, function ($message) use ($data) {
                $message->to($data['send_email'])
                        ->subject("Order360 - You Have Received a New Job - " . $data['address']);
            });

            //Email for Assign Painter End  ...


            //push notification shart
                $users = AllowNotification::where('user_id',  $request->assigned_painter_name)->get();
                $firebaseTokens = $users->pluck('device_token')->toArray();
                    if (empty($firebaseTokens)) {
                    // Handle the case where there are no tokens
                    $firebaseTokens = null;
                }
                    $SERVER_API_KEY = 'AAAA-_tCmgY:APA91bGCOWTO-2jSJ_PHwatoh_ihC0sB_LBWMlRphSwgP7HCRz4vqVBuPWAIiECM9fCAQfZcnH3_Qoi3SrLghvW1V0J4qbjTgTWAKHwEhJbfTjYMXZLgXcladYR7PbxYGIKBYUODZUcn';
                    $notificationBody = isset($AssingPainterInfo) ? $AssingPainterInfo->address : 'New Job Available!';
                    $data3 = ["registration_ids" => $firebaseTokens,
                    "notification" => [
                    "title" => "You Have Received a New Job !",
                    "body" =>   $notificationBody,
                    "content_available" => true,
                    "priority" => "high",
                ]
            ];
            $dataString = json_encode($data3);

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

        }
        if ($request->inside) {
            foreach ($request->inside as $oskey => $osvalue) {
                if ($osvalue['product']) {
                    $pjItem = new PjItem();
                    $osvalue['job_id'] = $painterjob->id;
                    $osvalue['key'] = $oskey;
                    $pjItem->fill($osvalue)->save();
                }
            }
        }
        if ($request->outside) {
            foreach ($request->outside as $oskey => $osvalue) {
                if ($osvalue['product']) {
                    $pjItem = new PjItem();
                    $osvalue['job_id'] = $painterjob->id;
                    $osvalue['type'] = 'outside';
                    $osvalue['key'] = $oskey;
                    $pjItem->fill($osvalue)->save();
                }
            }
        }




            $painterInfo = User::find($user_id);
            if (!$painterInfo) {
                // Handle the case where the painter is not found
                return response()->json(['message' => 'Painter not found'], 404);
            }

            $data = [
                'name' => $painterInfo->first_name . ' ' . $painterInfo->last_name,
                'address' => $request->address,
                'orderID' => 'Order360',
                'extrasMessage' => $request->builder_company_name,
                'price'  => $request->price,
                'send_email' => $painterInfo->email,
            ];

            Mail::send('new_shop.invoice.jobnotification', $data, function ($message) use ($data) {
                $message->to($data['send_email'])
                        ->subject("Order360 - You Have Received a New Job - " . $data['address']);
            });

        

          //push notification shart
            $users = AllowNotification::where('user_id',  $user_id)->get();
            $firebaseTokens = $users->pluck('device_token')->toArray();
                 if (empty($firebaseTokens)) {
                // Handle the case where there are no tokens
                $firebaseTokens = null;
            }
            $SERVER_API_KEY = 'AAAA-_tCmgY:APA91bGCOWTO-2jSJ_PHwatoh_ihC0sB_LBWMlRphSwgP7HCRz4vqVBuPWAIiECM9fCAQfZcnH3_Qoi3SrLghvW1V0J4qbjTgTWAKHwEhJbfTjYMXZLgXcladYR7PbxYGIKBYUODZUcn';
            $notificationBody = isset($painterJob) ? $painterJob->address : 'New Job Available!';
            $data = ["registration_ids" => $firebaseTokens,
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




        


        if ($request->po_item) {
          
            $MainPainter = User::find($user_id);
            $MainPainterEmail = $MainPainter->email;
            $admin_company_id = $request->company_id;
            $admin_company = BuilderModel::find($admin_company_id);
            $admin_company_name = $admin_company->company_name;
            $admin_company_email = $admin_company->builder_email;
            $currentDate = Carbon::now()->format('Y-m-d');
            $job_address = $request->address;

            foreach ($request->po_item as $pokey => $povalue) {
                $category = ($pokey >= 1 && $pokey <= 4) ? 'firstGroup' : (($pokey >= 5 && $pokey <= 8) ? 'secondGroup' : ' ');

                // Initialize the invoice model outside of the switch-case
                $invoice = new Invoice();
                switch ($category) {
                    case 'firstGroup':
                        $invoice->user_id = $user_id;
                        $invoice->customer_id = $admin_company_name;
                        $invoice->send_email = $admin_company_email;

                        break;
                    case 'secondGroup':
                        if (!is_null($request->assigned_painter_name)) {
                            $user_id = $request->assign_company_id; // This seems incorrect as user_id was already set. Assuming it's intentional.
                            $invoice->user_id = $request->assigned_painter_name; // This also seems potentially incorrect as it assigns a name to a user_id field.
                            $invoice->send_email = $MainPainterEmail;
                        }
                        break;
                }

                // Moved common invoice properties assignment outside of the switch-case
                $inv_numbers = Invoice::max('id') ?? 0;
                $next_inv_number = $inv_numbers + 1;
                $formatted_number = sprintf('INV:%05d', $next_inv_number);
                $invoice->inv_number = $formatted_number;
                $invoice->date = $currentDate;
                $invoice->purchase_order = $povalue['ponumber'] ?? '';
                $invoice->job_id = $painterjob->id;
                $invoice->address = $job_address;
                $invoice->batch = $pokey;
                $invoice->description = $povalue['description'] ?? '';
                $invoice->job_details = $povalue['job_details'] ?? '';
                $invoice->amount = $povalue['price'] ?? 0;
                $invoice->gst = $invoice->amount * 0.30; // Assuming a 30% GST rate
                $invoice->total_due = $invoice->amount + $invoice->gst;
                // Handle file upload, assuming this logic is correct and the same for both groups
                // Save the invoice
                $invoice->save();


                // Now create or update the PoItem with the invoice ID
                $poItem = new PoItems();
                $povalue['job_id'] = $painterjob->id;
                $povalue['batch'] = $pokey;
                $povalue['invoice_id'] = $invoice->id; // Linking the PoItem with the Invoice
                $this->manageFile($request, "po_item.$pokey.file", $povalue, $poItem, 'file');
                $poItem->fill($povalue)->save();
            }
        }

        Session::flash('message', 'PainterJob Added successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route("admins.painterJob.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PainterJob $painterjob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PainterJob $painterJob)
    {

        $items = $painterJob->items()->get();
        $data['inside'] = [];
        $data['outside'] = [];
        foreach ($items as  $item) {
            $data[$item->type][$item->key] = $item;
        }

        $assign_painter = AssignedPainterJob::where('job_id', $painterJob->id)->first();
        $painterJob->load('poItems');
        $buliders =  Builder::whereNotNull('name')->orderBy('name')->get();
        $brands = Brand::all();
        $users = User::whereNotNull('first_name')->orderBy('first_name')->get();
        $order = order::all();
        $admin_buliders = BuilderModel::all();
        $supervisors = Superviser::all();

        return view('admin.painter_jobs.add', ['data' => $data, 'order' => $order, 'admin_buliders' => $admin_buliders,   'assign_painter' => $assign_painter,  'supervisors' => $supervisors, 'users' => $users, 'brands' => $brands, 'painterjob' => $painterJob, 'buliders' => $buliders, 'outside' => $this->outside, 'inside' => $this->inside, 'items' => $items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PainterJob $painterJob)
    {
    //    echo $painterJob->toJson(); 
    //    exit();
       DB::beginTransaction();
        try {
            $data = $request->only($painterJob->getFillable());
            $this->manageFile($request, 'po', $data, $painterJob);
            $this->manageFile($request, 'colors', $data, $painterJob);
            $this->manageFile($request, 'plan', $data, $painterJob);
            $this->manageFile($request, 'colors_secound', $data, $painterJob);
            $this->manageFile($request, 'colors_spec', $data, $painterJob);
            $this->manageFile($request, 'plan_granny', $data, $painterJob);


            if ($request->has('company_id')) {
                $painterJob->builder_id = $request->company_id;
            }
            if ($request->has('assigned_painter_name')) {
                $painterJob->assign_painter = $request->assigned_painter_name;
            }
            
            $painterJob->fill($data)->save();

            $painterJob->items()->delete();
            if ($request->inside) {
                foreach ($request->inside as $oskey => $osvalue) {
                    if ($osvalue['product']) {
                        $pjItem = new PjItem();
                        $osvalue['job_id'] = $painterJob->id;
                        $osvalue['key'] = $oskey;
                        $pjItem->fill($osvalue)->save();
                    }
                }
            }


            if ($request->outside) {
                foreach ($request->outside as $oskey => $osvalue) {
                    if ($osvalue['product']) {
                        $pjItem = new PjItem();
                        $osvalue['job_id'] = $painterJob->id;
                        $osvalue['type'] = 'outside';
                        $osvalue['key'] = $oskey;
                        $pjItem->fill($osvalue)->save();
                    }
                }
            }
            if ($request->po_item) {
                foreach ($request->po_item as $poKey => $poValue) {
                    //** This is fully optional we can do into invoice ***///
                    $poItem = PoItems::where(['job_id' => $painterJob->id, 'batch' => $poKey])->firstOrNew();

                    if (!$poItem->exists || ($poItem->exists && !$poItem->invoice_id)) {
                        // Assuming PoItems model has 'job_id', 'batch', 'job_details', 'description' fields
                        $poItem->job_id = $painterJob->id;
                        $poItem->batch = $poKey;
                        $poItem->job_details = $poValue['job_details'];
                        $poItem->description = $poValue['description'];
                        $poItem->save();
                    }
                    //** This is fully optional we can do into invoice ***///
                    
                    if ($poItem->exists && $poItem->invoice_id) {
                        $invoice = Invoice::findOrFail($poItem->invoice_id);
                    } else {
                        $invoice = new Invoice();
                        $invoice->po_item_id = $poItem->id; // Assuming there's a relationship to link back to PoItems
                    }

                    $invoice->amount = $poValue['price'];
                    $invoice->gst = $poValue['price'] * 0.10; // Calculate GST as 10% of the price.
                    $invoice->total_due = $poValue['price'] * 1.10; // Total due includes the price plus GST.

                    if ($request->hasFile("po_item.$poKey.file")) {
                        $file = $request->file("po_item.$poKey.file");
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $attachmentPath = $file->storeAs('', $fileName, 'public');
                        $invoice->attachment =  $attachmentPath;
                    }

                    $invoice->job_details = $poValue['job_details'];
                    $invoice->description = $poValue['description'];
                    $invoice->save();
                }
            }

  // Update or create PO items and related invoices
        if ($request->po_item) {
            foreach ($request->po_item as $poKey => $poValue) {
                $poItem = PoItems::firstOrNew(['job_id' => $painterJob->id, 'batch' => $poKey]);

                $poItem->job_id = $painterJob->id;
                $poItem->batch = $poKey;
                $poItem->job_details = $poValue['job_details'];
                $poItem->description = $poValue['description'];
                $poItem->save();

                $invoice = $poItem->invoice ?? new Invoice();

                $invoice->amount = $poValue['price'];
                $invoice->gst = $poValue['price'] * 0.10;
                $invoice->total_due = $poValue['price'] * 1.10;
                $invoice->job_details = $poValue['job_details'];
                $invoice->description = $poValue['description'];

                if ($request->hasFile("po_item.$poKey.file")) {
                    $file = $request->file("po_item.$poKey.file");
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $attachmentPath = $file->storeAs('', $fileName, 'public');
                    $invoice->attachment = $attachmentPath;
                }

                $invoice->save();
            }
        }

        // Update or create the assigned painter job
        if (!empty($request->assigned_painter_name) && !empty($request->assign_company_id) && !empty($request->assign_price_job)) {
            $assignedPainterJob = AssignedPainterJob::firstOrNew(['job_id' => $painterJob->id]);
            $assignedPainterJob->assigned_painter_name = $request->assigned_painter_name;
            $assignedPainterJob->assign_company_id = $request->assign_company_id;
            $assignedPainterJob->assigned_supervisor = $request->assigned_supervisor;
            $assignedPainterJob->assign_price_job = $request->assign_price_job;
            $assignedPainterJob->assign_job_description = $request->assign_job_description;
            $assignedPainterJob->user_id = $request->user_id;
            $assignedPainterJob->save();


    

            $AssingPainterInfo = User::find($request->assigned_painter_name);

                  $matchingInvoices = Invoice::where('user_id', $AssingPainterInfo->id)
                               ->where('job_id', $painterJob->id)
                               ->get();

                                 if ($matchingInvoices->isNotEmpty()) {
                        // Delete all matching invoices
                        DB::transaction(function () use ($matchingInvoices) {
                            foreach ($matchingInvoices as $invoice) {
                                $invoice->delete();
                            }
                        });
                    }


             // Generate the next invoice number
                $maxId = Invoice::max('id');
                $nextId = $maxId + 1;
                $maxInvoiceNumber = sprintf('INV: %04d', $nextId);

                // Calculate amounts
                $amount = $request->assign_price_job;
                $gst = $amount * 0.10;
                $amountAfterGst = $amount - $gst;

                // Prepare the data for the new invoice
                $invoiceData = [
                    'user_id' => $AssingPainterInfo->id,
                    'company_name' => $AssingPainterInfo->company_name,
                    'user_address' => $AssingPainterInfo->address,
                    'user_name' => $AssingPainterInfo->first_name,
                    'user_phone' => $assignedPainterInfo->phone,
                    'abn' => $assignedPainterInfo->abn,
                    'customer_id' => $mainPainterInfo->company_name, // Ensure $mainPainterInfo is defined
                    'send_email' => $mainPainterInfo->email, // Ensure $mainPainterInfo is defined
                    'inv_number' => $maxInvoiceNumber,
                    'date' => now()->toDateString(),
                    'purchase_order' => null,
                    'job_id' => $painterJob->id,
                    'description' => $request->assign_job_description,
                    'address' => $request->address,
                    'job_details' => '',
                    'amount' => $amountAfterGst,
                    'gst' => $gst,
                    'total_due' => $amount,
                    'status' => 1,
                ];

                //Create the new invoice
                DB::transaction(function () use ($invoiceData) {
                    Invoice::create($invoiceData);
                });
            // this data for email 
            $data = [
                'name' => $AssingPainterInfo->first_name . ' ' . $AssingPainterInfo->last_name,
                'address' => $request->address,
                'orderID' => 'Order360',
                'extrasMessage' => $request->builder_company_name,
                'price' => $request->assign_price_job,
                'send_email' => $AssingPainterInfo->email,
            ];

            Mail::send('new_shop.invoice.jobnotification', $data, function ($message) use ($data) {
                $message->to($data['send_email'])
                    ->subject("Order360 - Job Updated - " . $data['address']);
            });

            $users = AllowNotification::where('user_id', $request->assigned_painter_name)->get();
            $firebaseTokens = $users->pluck('device_token')->toArray();
            if (!empty($firebaseTokens)) {
                $SERVER_API_KEY = 'YOUR_SERVER_API_KEY';
                $notificationBody = $AssingPainterInfo->address ?? 'New Job Available!';
                $data3 = [
                    "registration_ids" => $firebaseTokens,
                    "notification" => [
                        "title" => "You Have Received a New Job!",
                        "body" => $notificationBody,
                        "content_available" => true,
                        "priority" => "high",
                    ]
                ];
                $dataString = json_encode($data3);
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
                curl_close($ch);
            }
        }

            // Update or Create logic for AssignedPainterJob
            $assignedPainterJob = AssignedPainterJob::firstOrNew(['job_id' => $painterJob->id]); // Assuming 'job_id' is the correct identifier
            $assignedPainterJob->fill($request->only(['assigned_painter_name', 'assign_company_id', 'assigned_supervisor', 'assign_price_job', 'job_description']))->save();
            DB::commit();
            Session::flash('message', 'PainterJob updated successfully');
            Session::flash('alert-class', 'alert-success');
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle the exception
            Session::flash('message', 'Update failed: ' . $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->route("admins.painterJob.index");
    }

    // public function PoItems()
    // {
    //     return $this->hasMany(PoItem::class, 'job_id');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(PainterJob $painterJob)
    {
        $painterJob->delete(); // Then deleting the painter job

        // Flashing a success message
        return redirect()->route("admins.painterJob.index")->with([
            'message' => 'PainterJob deleted successfully',
            'alert-class' => 'alert-success'
        ]);
    }

    public function delete_painter($id)
    {
        PainterJob::where('id', $id)->delete();
        Session::flash('Deleted Successfully.');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route("admins.painterJob.index");
    }

    public function manageFile($request, $key, &$data, $model, $db_key = null)
    {
        if ($request->hasFile($key)) {
            $image = $request->file($key);
            if ($db_key) {
                $key = $db_key;
            }
            $this->deleteFile($key, $model);
            $imageName = time() . rand(1111111111, 9999999999) . $image->getClientOriginalName();
            $image->move(public_path('/uploads/'), $imageName);
            $data[$key] = $imageName;
        }
    }

    public function deleteFile($key, &$model)
    {
        if (file_exists(public_path('/uploads/') . $model->$key)) {
            @unlink(public_path('/uploads/') . $model->$key);
        }
    }
}
