@extends('layouts.master')
@section('content')
    <h1>{{ $custormer->name }}</h1>

    <table class="table table-hover">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Bank Account</th>
            <th>Credibility</th>
            <th></th>
        </tr>
        <tr>
            <td>{{ $custormer->name }}</td>
            <td>{{ $custormer->phone_nr }}</td>
            <td>{{ $custormer->street }} {{ $custormer->house_nr }}, {{ $custormer->city }}</td>
            <td>{{ $custormer->bank_account }}</td>
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
                <form action="{{ action('FinanceController@updateProject', $project->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="done" value="{{ $project->done }}" >
                    <input type="hidden" name="id" value="{{ $project->id }}">
                    <button type="submit" class="btn btn-primary">Set finished</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection