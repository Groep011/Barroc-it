<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Develepment;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$projects = \App\model\Project::all();
        $custormers = \App\model\Custormer::all();
        return view('finance.finance')
            ->with('custormers', $custormers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $custormer = \App\model\Custormer::find($id);
        $projects = \App\model\Project::where('klant_nr', $id)->get();

        return view('finance.show')
            ->with('projects', $projects)
            ->with('custormer', $custormer);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)


    {
//        $custormers = \App\Custormer::find($id);
//        $custormers->id             = Input::get("id");
//        $custormers->name           = Input::get('name');
//        $custormers->phone_nr       = Input::get('phone_nr');
//        $custormers->city           = Input::get('city');
//        $custormers->house_nr       = Input::get('house_nr');
//        $custormers->bank_account   = Input::get('bank_account');
//        $custormers->created_at     = Input::get('created_at');
//        $custormers->updated_at     = $request->now();
//        $custormers->credible       = $request->credible;


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
        $this->validate($request, [
            'credible' => 'required|string|min:1',
            'id' => 'required|integer|min:1'
        ]);
        $custormer = \App\model\Custormer::find($id);
        if ($custormer->credible == 'T') {
            $custormer->credible = 'F';
        }
        else $custormer->credible = 'T';
        $custormer->save();
        return back();
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

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProject(Request $request, $id)
    {
        $this->validate($request, [
            'done' => 'required|string|min:1',
            'id' => 'required|integer|min:1'
        ]);
        $project = \App\model\Project::find($id);
        if ($project->done == 'T') {
            $project->done = 'F';
        }
        else $project->done = 'T';
        $project->save();
        return back();
    }
    public function results(Request $request)
    {
        
        $text = $request['name-text'];
        $sqlList = null;
        $exeute = false;
        if (isset($text))
        {
            $sqlList = ['name' , '=', $text];
            $exeute = true;
        }

        if ($exeute)
        {
            $test = DB::table('custormer')->select(DB::raw('*'))->where([$sqlList])->get();
            
            //dd($test);
            return view('search')->with('projecten', $test);
        }
        else
        {
            $test = DB::table('projects')->select(DB::raw('*'))->get();
            return view('search')->with('custormers', $test);
        }
    }
}
