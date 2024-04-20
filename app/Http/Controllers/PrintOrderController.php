<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrintOrder; // Assuming this is the model for your 'print_order' table

class PrintOrderController extends Controller
{
    /**
     * Store a new print order.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'painter_id' => 'required|integer',
            'painter_address' => 'nullable|string',
            'painter_longitude' => 'nullable|numeric',
            'painter_latitude' => 'nullable|numeric',
            'job_address' => 'nullable|string',
            'job_longitude' => 'nullable|numeric',
            'job_latitude' => 'nullable|numeric',
            'brand_id' => 'required|integer',
            'date' => 'required|date',
            'kit_status' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        // Create and save the new print order
        $printOrder = PrintOrder::create($validatedData);

        // Redirect the user with a success message
        return redirect()->back()->with('success', 'Print order created successfully!');
    }

    /**
     * Update an existing print order.
     */
    public function update(Request $request, $id)
    {
        // Find the existing print order
        $printOrder = PrintOrder::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'painter_id' => 'required|integer',
            'painter_address' => 'nullable|string',
            'painter_longitude' => 'nullable|numeric',
            'painter_latitude' => 'nullable|numeric',
            'job_address' => 'nullable|string',
            'job_longitude' => 'nullable|numeric',
            'job_latitude' => 'nullable|numeric',
            'brand_id' => 'required|integer',
            'date' => 'required|date',
            'kit_status' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        // Update the print order
        $printOrder->update($validatedData);

        // Redirect the user with a success message
        return redirect()->route('somewhere')->with('success', 'Print order updated successfully!');
    }
}
