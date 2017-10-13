<?php

namespace App\Http\Controllers;

use App\Custormer;
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
        $custormers = Custormer::all();
        return view('sales')
            ->with('custormers', $custormers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AddCustormer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Custormer  $custormer
     * @return \Illuminate\Http\Response
     */
    public function show(Custormer $custormer)
    {
        //
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
}
