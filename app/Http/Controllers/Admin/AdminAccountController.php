<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Session;

class AdminAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $painter)
    {
        $accounts = Account::where('user_id', $painter->id)->with('brand')->get()->sortByDesc('brand.name');
        return View::make('admin.account.index', array('accounts' => $accounts, 'painter' => $painter));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $painter)
    {
        $brands = Brand::all();
        $account = new Account();
        return View::make('admins.account.create', array('account' => $account, 'brands' => $brands, 'painter' => $painter));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request, User $painter)
    {
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        $account = new Account();
        $account->fill($data)->save();
        Session::flash('message', 'Account added successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admins.accounts.index', ['painter' => $painter->id]);
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
    public function destroy(Request $request,  User $painter, Account $account)
    {
        $account->delete();
        Session::flash('message', 'Account removed successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admins.accounts.index', ['painter' => $painter->id]);
    }
}
