<?php

namespace App\Http\Controllers;

use App\model\Custormer;
use App\model\Project;
use Illuminate\Http\Request;

class CustormerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!LevelCheck::Check(1))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm'); 
        $custormers = Custormer::all();
        return view('sales.sales')
            ->with('custormers', $custormers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!LevelCheck::Check(1))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm'); 
        return view('sales.addcustormer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!LevelCheck::Check(1))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm'); 
//        dd($request);

        $this->validate($request, [
            'Name' => 'required|string|min:6',
            'Phonenumber' => 'required|integer|min:8',
            'City'  => 'required|string|min:3',
            'Street'  => 'required|string|min:3',
            'housenumber'  => 'required|string|min:1',
            'bankaccount'  => 'required|string|min:10',
        ]);

        $custormer = new \App\model\Custormer();
        $custormer->name = $request->Name;
        $custormer->phone_nr        = $request->Phonenumber;
        $custormer->city            = $request->City;
        $custormer->street          = $request->Street;
        $custormer->house_nr        = $request->housenumber;
        $custormer->bank_acount     = $request->bankaccount;
        $custormer->credible        = 'F';
        $custormer->created_at      = now();
        $custormer->save();

        return redirect('custormer');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Custormer  $custormer
     * @return \Illuminate\Http\Response
     */
    public function show(Custormer $custormer)
    {
        if(!LevelCheck::Check(1))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm'); 
        $custormers = Custormer::where('id', '=', $custormer->id)->first();
        $projects = Project::where('klant_nr', '=', $custormer->id)->get();
        return view('sales.custormer')
            ->with('custormers', $custormers)
            ->with('projects', $projects);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Custormer  $custormer
     * @return \Illuminate\Http\Response
     */
    public function edit(Custormer $custormer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Custormer  $custormer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Custormer $custormer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Custormer  $custormer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Custormer $custormer)
    {
        //
    }

    public function getCustormers()
    {
        if(!LevelCheck::Check(1))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm'); 
        $custormers = Custormer::select(array(
            'name', 'street', 'house_nr', 'credible'
        ));
        return Datatables::of($custormers)->make(true);
    }
}
