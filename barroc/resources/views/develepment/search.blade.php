@extends('layouts/develepment')

@section('nav-links')
<li><a href="/develepment">projecten</a></li>
<li><a href="/develepment/search">Search</a></li>
@endsection

@section('title')
<h2 class='col-xs-offset-2'>Projecten Search</h2>
    <hr>
    <form action="/develepment/search" class="col-xs-10 col-xs-offset-1" method="post">
        {{ csrf_field() }}
        <div class="group-form">
            <input type="checkbox" name="ongoing">
            <label for="ongoing">Ongoing projects</label>
        </div>
        <div class="group-form">
            <input type="checkbox" name="done">
            <label for="done">Done projects</label>
        </div>
        <div class="group-form">
            <label for="name-text">Projectname:</label>
            <input type="text" name='name-text' placeholder='Enter your project Name'>
        </div>
        <div class='group-form'>
            <input type="submit" class='btn btn-primary' value='Search'>  
        </div>
    </form>
    <hr>
@endsection

@section('main-content')
<table class='col-xs-10 col-xs-offset-1'>
        <tr>
            <th class='col-xs-2'>Ongoing</th>
            <th class='col-xs-2'>Project Id</th>
            <th class='col-xs-5'>Naam</th>
            <th class='col-xs-2'>Info</th>
            <th class='col-xs-1'>Done</th>
        </tr>
        @foreach ($projecten as $project)
        <tr>@if ($project->ongoing == 'T')
            <th class='col-xs-1'><img class='done-img' src="/img/dev/done.jpg" alt="done"></th>
            @endif
            @if ($project->ongoing == 'F')
            <th class='col-xs-1'><img class='done-img' src="/img/dev/not.jpg" alt="not-done"></th>
            @endif
            <th class='col-xs-2'>{{ $project->id }}</th>
            <th class='col-xs-6'>{{ $project->name }}</th>
            <th class='col-xs-2'><a href="/develepment/{{$project->klant_nr}}">Info</a></th>
            @if ($project->done == 'T')
            <th class='col-xs-1'><img class='done-img' src="/img/dev/done.jpg" alt="done"></th>
            @endif
            @if ($project->done == 'F')
            <th class='col-xs-1'><img class='done-img' src="/img/dev/not.jpg" alt="not-done"></th>
            @endif
        </tr>
        @endforeach
    </table>
@endsection

@section('scripts')
@endsection