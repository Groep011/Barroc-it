<?php

namespace App\Http\Controllers;

use App\model\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if(!LevelCheck::Check(1))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm'); 
//        dd($request);
        $this->validate($request, [
            'Name' => 'required|string|min:6',
            'id' => 'required|string|min:1',
            'maxdebt'  => 'required|string|min:3|max:5',
            'note'  => '|string|min:10',
        ]);

        $project = new \App\model\Project();
        $project->klant_nr  = $request->id;
        $project->name      = $request->Name;
        $project->dept_max  = $request->maxdebt;
        $project->debt      = 0;
        $project->ongoing   = 'T';
        $project->note      = $request->note;
        $project->done      = 'F';
        $project->created_at = now();
        $project->updated_at = now();
        $project->save();

        return redirect('custormer/'.$request->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

}
