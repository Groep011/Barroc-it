<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Project;
use Illuminate\Support\Facades\DB;
use App\Classes\Develepment;
use App\model\Custormer;
use App\Classes\LevelCheck;
use Illuminate\Support\Facades\Auth;

class DevelepmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->Check(4))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm'); // zorgt voor de afsluiting

        $projecten = Project::all();

        return view('develepment/index', compact('projecten', $projecten));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search()
    {
        if(!Auth::user()->Check(4))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm'); 
        $projecten = Project::all();

        return view('develepment/search', compact('projecten', $projecten));
    }

    public function results(Request $request)
    {
        if(!Auth::user()->Check(4))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm'); 
        $ongoing = $request['ongoing'];
        $done = $request['done'];
        $text = $request['name-text'];
        $sqlList = null;
        $exeute = false;
        if (isset($ongoing))
        {
            $sqlList = Develepment::addSql( $sqlList,['ongoing' , '=', 'T']);
            $exeute = true;
            echo 1;
        }

        if (isset($done))
        {
            $sqlList = Develepment::addSql( $sqlList,['done' , '=', 'T']);
            $exeute = true;
        }

        if (isset($text))
        {
            $sqlList = Develepment::addSql( $sqlList,['name' , '=', $text]);
            $exeute = true;
        }

        if ($exeute)
        {
            $test = DB::table('projects')->select(DB::raw('*'))->where($sqlList)->get();
            
            //dd($test);
            return view('develepment/search')->with('projecten', $test);
        }
        else
        {
            $test = DB::table('projects')->select(DB::raw('*'))->get();
            return view('develepment/search')->with('projecten', $test);
        }
    }
    
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Auth::user()->Check(4))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm'); 
        $custormers = Custormer::where('id', '=', $id)->first();
        $projects = Project::where('klant_nr', '=', $id)->get();
        return view('develepment/info')
            ->with('custormers', $custormers)
            ->with('projects', $projects);
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
    public function destroy($id)
    {
        // 
    }
}
