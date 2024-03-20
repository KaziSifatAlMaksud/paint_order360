<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use App\Models\Builder;
use Illuminate\Support\Facades\Storage;
use App\Models\BuilderModel;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\adminbulderRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;


class BuilderController extends Controller
{
    //
    public function index()
    {
        $builders = BuilderModel::with('brand')->get();
        return view('admin.show_builder', ['builders' => $builders]);
    }
    public function create()
    {

        $brands = Brand::all();
        return view('admin.add_builder', array('brands' => $brands));
    }

    // public function store(Request $request)
    // {
    //     // Validate the incoming request data first.
    //     $request->validate([
    //         'img_log' => 'file|max:2048|nullable',
    //         'company_name' => 'required',
    //         'builder_name' => 'required',
    //         'builder_email' => 'required|email',
    //         'brand_id' => 'required',
    //         'phone_number' => 'required',
    //         'address' => 'required',
    //         'abn' => 'required',
    //         'gate' => 'required',
    //         'schedule' => 'required',
    //         // 'account_type' => 'required', // Uncomment or adjust as needed
    //     ]);

    //     // Initialize $attachmentName with a default value or null if you have a default image
    //     $attachmentName = null;

    //     // Check if a file was uploaded and process it.
    //     if ($request->hasFile('img_log')) {
    //         $file = $request->file('img_log');
    //         $filename = 'img_log_' . time() . '.' . $file->getClientOriginalExtension();
    //         $path =  $image->move(public_path('/uploads/'), $imageName);
    //         $attachmentName = $path; // Update to use the actual file path after upload
    //     }

    //     // Prepare the data for insertion.
    //     $builderData = [
    //         'company_name' => $request->input('company_name'),
    //         'builder_name' => $request->input('builder_name'),
    //         'builder_email' => $request->input('builder_email'),
    //         'brand_id' => $request->input('brand_id'),
    //         'phone_number' => $request->input('phone_number'),
    //         'address' => $request->input('address'),
    //         'abn' => $request->input('abn'),
    //         'gate' => $request->input('gate'),
    //         'schedule' => $request->input('schedule'),
    //         'account_type' => $request->input('account_type', 'default_account_type'),
    //         'img_log' => $attachmentName,
    //     ];

    //     try {
    //         // Attempt to create the builder record using the correct model.
    //         $builder = BuilderModel::create($builderData);
    //         Log::info('Builder created successfully', ['builder_id' => $builder->id]);
    //         return redirect('admin/admin_builder')->with('success', 'Builder account created successfully.');
    //     } catch (\Exception $e) {
    //         Log::error('Error creating builder', ['error' => $e->getMessage()]);
    //         return redirect()->back()->withInput()->with('error', 'Failed to create builder account.');
    //     }
    // }
    public function store(Request $request)
    {
        // Validate the incoming request data.
        $validatedData = $request->validate([
            'img_log' => 'file|max:2048|nullable',
            'company_name' => 'required|string|max:255',
            'builder_name' => 'required|string|max:255',
            'builder_email' => 'required|email|max:255',
            'brand_id' => 'required|integer',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'abn' => 'required|string|max:255',
            'gate' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            // 'account_type' => 'required|string|max:255', // Uncomment or adjust as needed
        ]);

        $attachmentName = null; // Default to null if no file is uploaded

        // Check if a file was uploaded and process it.
        if ($request->hasFile('img_log')) {
            $file = $request->file('img_log');
            $filename = 'img_log_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->move(public_path('uploads'), $filename); // Corrected variable names and path
            $attachmentName = $filename; // Save the filename for insertion into the database
        }

        // Prepare the data for insertion, including the potentially uploaded file.
        $builderData = $validatedData; // Use validated data
        $builderData['img_log'] = $attachmentName;

        try {
            // Attempt to create the builder record using the correct model.
            $builder = BuilderModel::create($builderData);
            Log::info('Builder created successfully', ['builder_id' => $builder->id]);
            return redirect('admin/admin_builder')->with('success', 'Builder account created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating builder', ['error' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'Failed to create builder account.');
        }
    }



    public function edit($admin_builder)
    {
        $brands = Brand::all();
        $builders = BuilderModel::findOrFail($admin_builder);
        return view('admin.edit_builder', ['builders' => $builders, 'brands' => $brands]);
    }


    public function update(Request $request, $id)
    {
        // Find the builder by ID or fail
        $builder = BuilderModel::findOrFail($id);

        // Validate the incoming request data.
        $validatedData = $request->validate([
            'img_log' => 'file|max:2048|nullable',
            'company_name' => 'required|string|max:255',
            'builder_name' => 'required|string|max:255',
            'builder_email' => 'required|email|max:255',
            'brand_id' => 'required|integer',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'abn' => 'required|string|max:255',
            'gate' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            // 'account_type' => 'required|string|max:255', // Uncomment or adjust as needed
        ]);

        // Check if a new file was uploaded and process it.
        if ($request->hasFile('img_log')) {
            $file = $request->file('img_log');
            $filename = 'img_log_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->move(public_path('uploads'), $filename);

            // If a new file is uploaded, delete the old file if it exists
            if ($builder->img_log && file_exists(public_path('uploads') . '/' . $builder->img_log)) {
                unlink(public_path('uploads') . '/' . $builder->img_log);
            }

            // Update the filename for insertion into the database
            $validatedData['img_log'] = $filename;
        }

        try {
            // Update the builder record with the new data
            $builder->update($validatedData);
            Log::info('Builder updated successfully', ['builder_id' => $builder->id]);
            return redirect('admin/admin_builder')->with('success', 'Builder account updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating builder', ['error' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'Failed to update builder account.');
        }
    }



    public function destroy($admin_builder)
    {
        BuilderModel::findOrFail($admin_builder)->delete();
    }



    public function handleRequest(Request $request)
    {
        if ($request->isMethod('get')) {
            $users = User::all();
            $admin_builders = BuilderModel::all();


            $customers = DB::table('customers')->where('state', 1)->get();


            return view('admin.assign_builder', ['users' => $users, 'admin_builders' => $admin_builders, 'customers' => $customers]);
        }

        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'admin_builder_id' => 'required|numeric',
                'user_id' => 'required|numeric'
            ]);

            try {
                $adminBuilderId = $validatedData['admin_builder_id'];
                $adminBuilder = BuilderModel::findOrFail($adminBuilderId);

                $existingCustomer = Customer::where('companyName', $adminBuilder->company_name)
                    ->where('user_id', $validatedData['user_id'])
                    ->first();

                if ($existingCustomer) {

                    return response()->json(['error' => 'Customer already exists'], 409); // 409 Conflict
                }
                $customer = new Customer([
                    'companyName' => $adminBuilder->company_name,
                    'name' => $adminBuilder->company_name,
                    'email' => $adminBuilder->builder_email,
                    'mobile' => $adminBuilder->phone_number,
                    'abn' => $adminBuilder->abn,
                    'billingAddress' => $adminBuilder->address,
                    'user_id' => $validatedData['user_id'],
                    'schedule' => $adminBuilder->schedule,
                    'gst' => $adminBuilder->gate,
                    'state' => 1
                ]);

                $customer->save();

                return response()->json(['success' => 'Customer created successfully']);
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return response()->json(['error' => 'Builder not found'], 404);
            }
        }

        if ($request->isMethod('delete')) {
        }
    }


    public function show()
    {
        dd('show');
    }

    public function deleteCustomer(Request $request, $id)
    {
        $customer = Customer::find($id);

        if ($customer) {
            $customer->delete();
            return response()->json(['message' => 'Customer deleted successfully']);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
}
