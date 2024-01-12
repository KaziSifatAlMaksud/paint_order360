<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create()
    {

        // Pass the success message to the view
        return view('customer.createadd');
    }
    public function update($id)
    {
        $customer = Customer::find($id);

        // Pass the success message to the view
        return view('customer.createadd', ['customer' => $customer]);
    }



    public function all_customers(Request $request)
    {
        $customers = Customer::all()->where('user_id', $request->user()->id);
        return view('painter.all_customers', ['customers' => $customers]);
    }

    public function store(Request $request)
    {
        $user_id = $request->user()->id;
        $customer = null;
        if ($request->input('action') == 'update') {
            $id = $request->input('id');
            $customer = Customer::find($id);

            if (!$customer) {
                return redirect()->back()->withErrors(['Customer not found.']);
            }
            $customer->user_id = $user_id;
            $customer->fill($request->all());
            $customer->save();
            $message = 'Customer updated successfully!';
        } elseif ($request->input('action') == 'save') {

            $customer = new Customer($request->all());
            $customer->user_id = $user_id;
            $customer->save();
            $message = 'Customer added successfully!';
        }

        // Redirect back with a success message
        // return redirect()->back()->with('success', );
        return redirect()->back()->with('go_back', true)->with('success', $message);
    }
    public function delete($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return redirect('/customers')->with('success', 'Customer deleted successfully.');
        }
        $customer->delete();
        return redirect('/customers')->with('success', 'Customer deleted successfully.');
    }
}
