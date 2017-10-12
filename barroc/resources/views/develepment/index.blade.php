@extends('layouts/develepment')

@section('nav-links')
<li><a href="develepment">projecten</a></li>
<li><a href="develepment/search">projecten</a></li>
@endsection

@section('title')
    <h2 class='col-xs-offset-2'>Projecten</h2>
    <hr>
@endsection

@section('main-content')
    <table class='col-xs-10 col-xs-offset-1'>
        <tr>
            <th class='col-xs-2'>Ongoing</th>
            <th class='col-xs-2'>Project Id</th>
            <th class='col-xs-6'>Naam</th>
            <th class='col-xs-2'>Info</th>
        </tr>
        @foreach ($projecten as $project)
        <tr>
            <th>{{ $project }}</th>
            <th>{{ $project['id'] }}</th>
            <th>{{ $project['note'] }}</th>
            <th><a href="/develepment/{{$project['id']}}">Info</a></th>
        </tr>
        @endforeach
    </table>
@endsection

@section('scripts')
@endsection