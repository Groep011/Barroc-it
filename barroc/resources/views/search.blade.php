@extends('layouts/develepment')
<?php 
require( app_path() . '\Classes\LevelCheck.php');

?>
@section('nav-links')
<li><a href="/">Home</a></li>
@endsection

@section('title')
<h2 class='col-xs-offset-2'>Projecten Search</h2>
    <hr>
    <form action="/search" class="col-xs-10 col-xs-offset-1" method="post">
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

@section('main-content')
    @if( \Auth::user()->Check(1) )
    <div class="container">
    <table class="table table-striped">
        <tr>
            <th>Company Name</th>
            <th>Phone Number</th>
            <th>City</th>
            <th>Streetname</th>
            <th>House Number</th>
            <th>Credible</th>
            <th></th>
            <th></th>
        </tr>


    @foreach($custormers as $custormer)
        <tr>
        
            <td>{{$custormer->name}}</td>
            <td>{{$custormer->phone_nr}}</td>
            <td>{{$custormer->city}}</td>
            <td>{{$custormer->street}}</td>
            <td>{{$custormer->house_nr}}</td>
            @if($custormer->credible == 'T')
                <td>Yes</td>
            @else
                <td>No</td>
            @endif
            <td><a href="{{action('custormerController@show', $custormer->id)}}" class="btn btn-success">View</a></td>

        </tr>
    @endforeach
    </table>
</div>
    @endif
    @if(\Auth::user()->Check(2) )
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
