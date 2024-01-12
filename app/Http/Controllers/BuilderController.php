<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use App\Models\Builder;
use App\Models\BuilderModel;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\adminbulderRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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

    public function store(adminbulderRequest $request)
    {
        // Create Builder account using Eloquent ORM
        BuilderModel::create([
            'company_name' => $request->input('company_name'),
            'builder_email' => $request->input('builder_email'),
            'account_type' => $request->input('account_type') ?? 'account_type',
            'brand_id' => $request->input('brand_id'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'abn' => $request->input('abn'),
            'gate' => $request->input('gate'),
        ]);
        return redirect('admin/admin_builder')->with('success', 'Builder account created successfully.');
    }
    public function show()
    {
        dd('show');
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



    // public function showPage()
    // {
    //     $users = User::all();
    //     $admin_builders = BuilderModel::all();


    //     $customers = DB::table('customers')->where('state', 1)->get();


    //     return view('admin.assign_builder', ['users' => $users, 'admin_builders' => $admin_builders, 'customers' => $customers]);
    // }


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
