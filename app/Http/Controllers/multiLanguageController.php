<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class multiLanguageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
        session()->put('locale', $request->lang);
        if ($request->user()) {
            $request->user()->update(['locale' => $request->lang]);
        }
    }
}
