<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Session;

class WebsiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websiteSetting =  WebsiteSetting::all();
        return view('admin.settings.index', ['websiteSetting' => $websiteSetting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $websiteSetting = new WebsiteSetting();
        // return view('admin.settings.add', ['websiteSetting' => $websiteSetting]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $websiteSetting = new WebsiteSetting();
        // $data = $request->only($websiteSetting->getFillable());

        // $websiteSetting->fill($data)->save();
        // Session::flash('message', 'websiteSetting Added successfully');
        // Session::flash('alert-class', 'alert-success');
        // return redirect()->route("admins.website_setting.index");
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
    public function edit(WebsiteSetting $website_setting)
    {
        return view('admin.settings.add', ['websiteSetting' => $website_setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteSetting $website_setting)
    {
        $data = $request->only($website_setting->getFillable());

        $website_setting->fill($data)->save();
        Session::flash('message', 'Setting updated successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route("admins.website_setting.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteSetting $website_setting)
    {
        $website_setting->delete();
        Session::flash('message', 'Setting Delete successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route("admins.website_setting.index");
    }
}
