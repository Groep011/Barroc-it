@extends('layouts/develepment')
<?php 
require( app_path() . '\Classes\LevelCheck.php');

?>
@section('nav-links')
<a href="/">Home</a>
@endsection

@section('title')
<h2 class='col-xs-offset-2'>Projecten Search</h2>
    <hr>
    <form action="/finance/search" class="col-xs-10 col-xs-offset-1" method="post">
        {{ csrf_field() }}
        <div class="group-form">
            <label for="name-text">customer name:</label>
            <input type="text" name='name-text' placeholder='Enter your project Name'>
        </div>
        <div class='group-form'>
            <input type="submit" class='btn btn-primary' value='Search'>  
        </div>
    </form>
    <hr>
@endsection

@section('content')
    @if( \Auth::user()->Check(1) )
        {{--{{dd($projects)}}--}}
<div class="container">
    {{--{{dd($custormers->id)}}--}}
    <h1>{{$custormers->name}}</h1>

    <h2>Info</h2>
    <table class="table table-striped">
        <tr>
            <th>Phone number</th>
            <td>{{$custormers->phone_nr}}</td>
        </tr>
        <tr>
            <th>City</th>
            <td>{{$custormers->city}}</td>
        </tr>
        <tr>
            <th>Adress</th>
            <td>{{$custormers->street}} {{$custormers->housnumber}}</td>
        </tr>
        <tr>
            <th>Credible</th>
            @if($custormers->credible == 'T')
                <td>Yes</td>
            @else
                <td>No</td>
            @endif
        </tr>
    </table>

    <h2>Projects</h2>
    <a href="../addproject/{{$custormers->id}}" class="btn-success btn">Add new project</a>
    <table class="table table-striped">
        <tr>
            <th>Project Name</th>
            <th>Ongoing</th>
            <th>Finished</th>
            <th>note</th>
        </tr>
        @foreach($projects as $project)

            <tr>
                <th>{{$project->name}}</th>
                @if($project->ongoing == 'T')
                    <td>Yes</td>
                @else
                    <td>No</td>
                @endif

                @if($project->done == 'T')
                    <td>Yes</td>
                @else
                    <td>No</td>
                @endif
                <td>{{$project->note}}</td>
            </tr>
            @endforeach
    </table>
</div>
    @endif
    @if(\Auth::user()->Check(1) )
        {{--<table class="table table-hover">--}}
        {{--<th>--}}
            {{--<tr>Pause</tr>--}}
            {{--<tr>Klant id</tr>--}}
            {{--<tr>Project/naam</tr>--}}
            {{--<tr>limiet</tr>--}}
            {{--<tr>info</tr>--}}
        {{--</th>--}}
        {{--<td>--}}
            {{--@foreach($custromer as $project)--}}
                {{--<tr>{{ $project->ongoing }}</tr>--}}
                {{--<tr>{{ $project->klant_nr }}</tr>--}}
                {{--<tr>{{ $project->name }}</tr>--}}
                {{--<tr>{{ $project->debt }}</tr>--}}
                {{--<tr></tr>--}}
            {{--@endforeach--}}
        {{--</td>--}}
    {{--</table>--}}
    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>naam</th>
                <th>adres</th>
                <th>credit</th>
                <th></th>
                <th>info</th>
            </tr>
            @foreach($custormers as $custormer)
                <tr>
                    <td>{{ $custormer->name }}</td>
                    <td>{{ $custormer->street }} {{ $custormer->house_nr }}</td>

                        @if($custormer->credible == 'T')
                            <td>Credible</td>
                        @else
                            <td>Not credible</td>
                        @endif
                    <td>
                        <form action="{{ action('FinanceController@update', $custormer->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="credible" value="{{ $custormer->credible }}" >
                            <input type="hidden" name="id" value="{{ $custormer->id }}">
                            <button type="submit" class="btn btn-primary">change credibility</button>
                        </form>
                    </td>
                    <td><button class="btn btn-default"><a href="{{ action('FinanceController@show', $custormer->id) }}">More info</a></button></td>
                </tr>
            @endforeach
        </table>
    </div>
    @endif
@endsection
