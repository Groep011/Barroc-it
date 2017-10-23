<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Project;
use Illuminate\Support\Facades\DB;
use App\Classes\Develepment;

class DevelepmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projecten = Project::all();


        /// test case
        $faker =  \Faker\Factory::create();
        $projecten = [
            [
                'id'        => 1,
                'klant_nr'  => 1,
                'name'      => $faker->name(),
                'dept_max'  => 300,
                'debt'      => 200,
                'ongoing'   => 'T',
                'note'      => "eeey",
                'done'      => 'F',
            ]
        ];


        return view('develepment/index', compact('projecten', $projecten));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search()
    {
        $projecten = Project::all();

        return view('develepment/search', compact('projecten', $projecten));
    }

    public function results(Request $request)
    {
        $ongoing = $request['ongoing'];
        $done = $request['done'];
        $text = $request['name-text'];
        $sqlList = null;
        $exeute = false;
        if (isset($ongoing))
        {
            $sqlList = Develepment::addSql( $sqlList," 'ongoing' , 'T' ");
            $exeute = true;
        }

        if (isset($done))
        {
            $sqlList = Develepment::addSql( $sqlList," 'done' , 'T' ");
            $exeute = true;
        }

        if (isset($text))
        {
            $sqlList = Develepment::addSql( $sqlList," 'name' , '$text' ");
            $exeute = true;
        }

        if ($exeute)
        {
            $test = DB::table('projects')->select('*')->where("$sqlList");
            return view('\develepment\search', compact('projecten', $test));
        }
        else
        {
            // return error !!!!!!!
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
        $project = Project::find($id);

        return view('develepment/info', compact('project', $project));
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
