<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\PjItem;
use App\Models\Builder;
use App\Models\PoItems;
use App\Models\PainterJob;
use App\Models\Superviser;
use App\Models\BuilderModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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
            'outside' => $this->outside, 'inside' => $this->inside
        ]);
    }


    public function delete($id)
    {
        $job = PainterJob::find($id);
        $job->delete();
        return redirect()->route('main')->with('success', 'Job deleted successfully.');
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
        // $order = Order::where('id', $request->order_id)->first();

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
        $painterjob->fill($data)->save();
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
        if ($request->po_item) {
            foreach ($request->po_item as $pokey => $povalue) {
                $poItem = new PoItems();
                $povalue['job_id'] = $painterjob->id;
                $povalue['batch'] = $pokey;
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
        $painterJob->load('poItems');
        $buliders =  Builder::whereNotNull('name')->orderBy('name')->get();
        $brands = Brand::all();
        $users = User::whereNotNull('first_name')->orderBy('first_name')->get();
        $order = order::all();
        $admin_buliders = BuilderModel::all();
        $supervisors = Superviser::all();

        return view('admin.painter_jobs.add', ['data' => $data, 'order' => $order, 'admin_buliders' => $admin_buliders,  'supervisors' => $supervisors, 'users' => $users, 'brands' => $brands, 'painterjob' => $painterJob, 'buliders' => $buliders, 'outside' => $this->outside, 'inside' => $this->inside, 'items' => $items]);
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
            foreach ($request->po_item as $pokey => $povalue) {
                $poItem = PoItems::where(['job_id' => $painterJob->id, 'batch' => $pokey])->first();
                if (!$poItem) {
                    $poItem = new PoItems();
                }
                $povalue['job_id'] = $painterJob->id;
                $povalue['batch'] = $pokey;
                $this->manageFile($request, "po_item.$pokey.file", $povalue, $poItem, 'file');
                $poItem->fill($povalue)->save();
            }
        }
        Session::flash('message', 'PainterJob updated successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route("admins.painterJob.index");
    }

    public function PoItems()
    {
        return $this->hasMany(PoItem::class, 'job_id');
    }

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
