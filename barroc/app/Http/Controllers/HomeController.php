<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        dd(Auth::user()->Check(2));
       // dd(Auth::user()->rank);
        //if(Auth::user()->Check(4))return redirect()->action('\App\Http\Controllers\FinanceController@index');
        if(Auth::user()->Check(2))return redirect()->action('\App\Http\Controllers\FinanceController@index');
        if(Auth::user()->Check(1))return redirect()->action('\App\Http\Controllers\custormerController@index');
        return view('home');
    }
}
