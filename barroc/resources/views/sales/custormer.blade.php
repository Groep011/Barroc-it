@extends('layouts.master')

@section('nav-links')
    <li><a href="/custormer">Customers</a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
@endsection

@section('content')
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

@endsection