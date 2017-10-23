@extends('layouts/develepment')

@section('nav-links')
<li><a href="/develepment">projecten</a></li>
<li><a href="/develepment/search">Search</a></li>
@endsection

@section('main-content')
{{--{{dd($custormers)}}--}}
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
    <table class="table table-striped">
        <tr>
            <th>Project Name</th>
            <th>Ongoing</th>
            <th>Finished</th>
            <th></th>
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
            </tr>
            @endforeach
    </table>
</div>
@endsection

@section('scripts')
@endsection