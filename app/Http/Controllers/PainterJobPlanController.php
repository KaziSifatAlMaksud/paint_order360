<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Account;
use App\Models\JobPp;
use App\Models\PainterJob;
use App\Models\GallaryPlan;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PainterJobPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PainterJob $painterJob)
    {
        $gallaryPlans = GallaryPlan::where('Job_id', $painterJob->id)->orderBy('order')->get();
        return view('admin.painter_jobs.plans.index', array('painterJob' => $painterJob, 'gallaryPlans' => $gallaryPlans));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // In PainterJobPlanController.php

    public function addPhoto($id)
    {
        $painterJob = PainterJob::findOrFail($id);
        return view('painter.add_photo', compact('painterJob'));
    }


    public function storePhoto(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'images' => 'required|image|max:10240', // for example, max 10MB
        ]);

        if ($request->hasFile('images')) {
            $image = $request->file('images');

            if ($image->isValid()) {
                $name = time() . '_' . $image->getClientOriginalName();
                $destination = public_path('/gallery_images/'); // Change the destination folder as needed

                if ($image->move($destination, $name)) {
                    // Check if an image already exists for the job_id
                    $imageExists = JobPp::where('job_id', $id)->exists();

                    if ($imageExists) {
                        // If an image exists, update it
                        JobPp::where('job_id', $id)->update([
                            'image' => $name,
                        ]);
                    } else {
                        // If no image exists, create a new JobPp record in the database
                        JobPp::create([
                            'job_id' => $id,
                            'image' => $name,
                            'order' => 0,
                        ]);
                    }

                    // Return a success message as JSON
                    $message = $imageExists ? 'Photo updated successfully!' : 'Photo uploaded successfully!';
                    return response()->json(['success' => true, 'message' => $message]);
                } else {
                    // Return an error message as JSON
                    return response()->json(['success' => false, 'message' => 'Failed to move the uploaded image.']);
                }
            } else {
                // Return an error message as JSON
                return response()->json(['success' => false, 'message' => 'Invalid image file.']);
            }
        } else {
            // Return an error message as JSON
            return response()->json(['success' => false, 'message' => 'No images were selected for upload.']);
        }
    }


    public function checkImageExists($job_id)
    {
        // Check if an image exists for the specified job_id
        $imageExists = JobPp::where('job_id', $job_id)->exists();

        return response()->json(['exists' => $imageExists]);
    }



    public function create(PainterJob $painterJob)
    {
        $gallaryPlan = new GallaryPlan();
        return view('admin.painter_jobs.plans.create', array('painterJob' => $painterJob, 'gallaryPlan' => $gallaryPlan));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PainterJob $painterJob)
    {
        $validator = Validator::make($request->all(), [
            'img' => 'dimensions:max_width=500,max_height=500,min_width=500,min_height=500',
        ], [
            'img.dimensions' => 'Image maximum width and height must be 500*500 px and minimum width and height must be 300*300 px.',
        ]);
        if ($validator->fails()) {
            return redirect('admin/painterJob/' . $painterJob->id . '/plans/create')
                ->withErrors($validator)
                ->withInput();
        }
        $gallaryPlan = new GallaryPlan();
        $data = $request->only($gallaryPlan->getFillable());
        $data['job_id'] = $painterJob->id;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = rand(111, 9999999) . $image->getClientOriginalName();
            $image->move(public_path('/gallery_images/'), $imageName);
            $data['img_url'] = $imageName;
        }
        $gallaryPlan->fill($data)->save();
        return redirect()->route("admins.plans.index", ['painterJob' => $painterJob->id])->with("status", "Plan Added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,  User $painter, Account $account)
    {
        $brands = Brand::all();
        return View::make('admins.account.create', array('account' => $account, 'brands' => $brands, 'painter' => $painter));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request,  User $painter, Account $account)
    {
        $data = $request->all();
        $account->fill($data)->save();
        Session::flash('message', 'Account updated successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admins.accounts.index', ['painter' => $painter->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, PainterJob $painterJob,  GallaryPlan $plan)
    {
        $plan->delete();
        Session::flash('message', 'Plan removed successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route("admins.plans.index", ['painterJob' => $painterJob])->with("status", "Plan Removed successfully");
    }
}
