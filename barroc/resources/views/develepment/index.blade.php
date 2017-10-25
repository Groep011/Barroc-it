@extends('layouts/develepment')

@section('nav-links')
    <li><a href="/develepment">projecten</a></li>
    <li><a href="/develepment/search">Search</a></li>
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
            <th class='col-xs-5'>Naam</th>
            <th class='col-xs-2'>Info</th>
            <th class='col-xs-1'>Done</th>
        </tr>
        @foreach ($projecten as $project)
        <tr>@if ($project['ongoing'] == 'T')
            <th class='col-xs-1'><img class='done-img' src="/img/dev/done.jpg" alt="done"></th>
            @endif
            @if ($project['ongoing'] == 'F')
            <th class='col-xs-1'><img class='done-img' src="/img/dev/not.jpg" alt="not-done"></th>
            @endif
            <th class='col-xs-2'>{{ $project['id'] }}</th>
            <th class='col-xs-6'>{{ $project['name'] }}</th>
            <th class='col-xs-2'><a href="/develepment/{{$project['klant_nr']}}">Info</a></th>
            <form action="{{ action('FinanceController@updateProject', $project->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" name="done" value="{{ $project->done }}" >
                <input type="hidden" name="id" value="{{ $project->id }}">
                @if ($project['done'] == 'T')
                    <th class='col-xs-1'><button type="submit"><img class='done-img' src="/img/dev/done.jpg" alt="done"></button></th>
                @else
                    <th class='col-xs-1'><button type="submit"><img class='done-img' src="/img/dev/not.jpg" alt="not-done"></button></th>
                @endif
            </form>
        </tr>
        @endforeach
    </table>
@endsection

@section('scripts')
@endsection