@extends('layouts.master')
@section('nav-links')
    <li><a href="/finance">Finance</a></li>
@endsection
@section('content')
    <div class="container">
        <h1>{{ $custormer->name }}</h1>

        <h2>Info</h2>
        <table class="table table-hover">
            <tr>
                <th>Name</th>
                <td>{{ $custormer->name }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $custormer->phone_nr }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $custormer->street }} {{ $custormer->house_nr }}, {{ $custormer->city }}</td>
            </tr>
            <tr>
                <th>Bank Account</th>
                <td>{{ $custormer->bank_acount }}</td>
            </tr>
            <tr>
                <th>Credibility</th>
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
                        <button type="submit" class="btn btn-success">change credibility</button>
                    </form>
                </td>
            </tr>
        </table>
        <hr>
        <h2>Ongoing projects</h2>
        <table class="table table-hover">
            <tr>
                <th>Description</th>
                <th>Ongoing</th>
                <th>Finished</th>
                <th></th>
            </tr>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->note }}</td>
                <td>
                    @if($project->ongoing == 'T')
                        Ongoing
                    @else
                        Not Ongoing
                    @endif
                </td>
                <td>
                    @if($project->done == 'T')
                        Project finished
                    @else
                        Project not finished
                    @endif
                </td>
                <td>
                    <form action="{{ action('FinanceController@setOngoing', $project->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="ongoing" value="{{ $project->ongoing }}" >
                        <input type="hidden" name="id" value="{{ $project->id }}">
                        <button type="submit" class="btn btn-success">Set Ongoing</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection