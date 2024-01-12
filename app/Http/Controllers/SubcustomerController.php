<?php

namespace App\Http\Controllers;

use App\Models\Subcustomer;
use Illuminate\Http\Request;


class SubcustomerController extends Controller
{
    public function create()
    {
        // Pass the success message to the view
        return view('customer.subcustomer');
    }

    public function update($id)
    {

        $subcustomer = Subcustomer::find($id);
        return view('customer.subcustomer', ['subcustomer' => $subcustomer]);
    }


    public function all_subc(Request $request)
    {
        $subcustomers = Subcustomer::all()->where('user_id', $request->user()->id);
        return view('painter.all_subcontractors', ['subcustomers' => $subcustomers]);
    }

    public function store(Request $request)
    {
        $user_id = $request->user()->id;
        $subcustomers = null;
        if ($request->input('action') == 'update') {
            $id = $request->input('id');
            $subcustomers = Subcustomer::find($id);

            if (!$subcustomers) {
                return redirect()->back()->withErrors(['Customer not found.']);
            }
            $subcustomers->user_id = $user_id;
            $subcustomers->fill($request->all());
            $subcustomers->save();
            $message = 'Customer updated successfully!';
        } elseif ($request->input('action') == 'save') {
            $subcustomers = new Subcustomer($request->all());
            $subcustomers->user_id = $user_id;
            $subcustomers->save();
            $message = 'Customer added successfully!';
        }
        // return redirect()->back()->with('success', $message);
        return redirect('/subcontractors')->with('success', $message);
    }

    public function delete($id)
    {
        $subcustomer = Subcustomer::find($id);
        if (!$subcustomer) {
            return redirect('/subcontractors')->with('success', 'Subcontractors deleted successfully.');
        }
        $subcustomer->delete();
        return redirect('/subcontractors')->with('success', 'Subcontractors deleted successfully.');
    }
}
