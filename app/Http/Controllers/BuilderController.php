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

    public function store(Request $request)
    {
        $request->validate([
            'icon_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable', // Adjust maximum file size as needed
            'company_name' => 'required',
            'builder_name' => 'required',
            'builder_email' => 'required|email',
            'brand_id' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'abn' => 'required',
            'gate' => 'required',
        ]);


        if ($request->hasFile('icon_img')) {
            $image = $request->file('icon_img');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Correctly prefixes the file name
            $destination = public_path('/gallery_images/');
            $image->move($destination, $imageName);

            $builder = BuilderModel::create([
                'icon_img' => $imageName,
                'company_name' => $request->input('company_name'),
                'builder_name' => $request->input('builder_name'),
                'builder_email' => $request->input('builder_email'),
                'brand_id' => $request->input('brand_id'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
                'abn' => $request->input('abn'),
                'gate' => $request->input('gate'),
                // Assuming 'account_type' is also intended to be stored but was missing in the initial attribute list
                'account_type' => $request->input('account_type', 'default_account_type'), // Use a default value if not provided
            ]);

            if ($builder) {
                return redirect('admin/admin_builder')->with('success', 'Builder account created successfully.');
            } else {
                // This else block might not be necessary since create() throws an exception on failure
                return redirect()->back()->with('error', 'Failed to create builder account.');
            }
        } else {
            $imageName = null; // Ensure there's a default value if no file is uploaded
        }
    }




    public function edit($admin_builder)
    {
        $brands = Brand::all();
        $builders = BuilderModel::findOrFail($admin_builder);
        return view('admin.edit_builder', ['builders' => $builders, 'brands' => $brands]);
    }
    public function update(adminbulderRequest $request, $admin_builder)
    {

        BuilderModel::findOrFail($admin_builder)->update($request->all());

        return true;
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
