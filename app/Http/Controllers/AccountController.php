<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accounts = Account::where('user_id', $request->user()->id)
            ->with('brand')
            ->get()
            ->sortByDesc('brand.name');
        return view('painter.account.index', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('painter.account.create', ['brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        $account = new Account();
        $account->fill($data)->save();
        Session::flash('message', 'Account added successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('accounts.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Account $account)
    {

        if ($request->user()->id != $account->user_id) {
            abort('403');
        }
        $account->delete();
        Session::flash('message', 'Account removed successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('accounts.index');
    }
}
