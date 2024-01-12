<?php

namespace App\Http\Controllers;

use App\Models\Superviser;
use Illuminate\Http\Request;
use App\Http\Requests\Superviser\StoreRequest;
use App\Http\Requests\Superviser\UpdateRequest;

class SuperviserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(String $id)
    {
        $builderId = $id;
        $supervisers = Superviser::where("builder_id" , $id)->get();
        return view('admin.superviser.index', compact('supervisers','builderId'));
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {  
        Superviser::create($request->all());
        return response()->json(['success' => 'Superviser Added Successfully']);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $superviser = Superviser::findOrFail($id);

       return view('admin.superviser.edit', compact('superviser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {  

        Superviser::findOrFail($id)->update($request->all()); 

        return response()->json(['success' => 'Superviser Edited Successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Superviser::findOrFail($id)->delete();

        return response()->json(['success' => 'Superviser Deleted Successfully']);
    }
}
