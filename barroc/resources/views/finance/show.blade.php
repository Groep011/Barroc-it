@extends('layouts.master')

@section('nav-links')
    <li><a href="finance">Customers</a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
@endsection


@section('content')

    <div class="container">
        <h1>{{ $custormer->name }}</h1>

        <table class="table table-striped">
            <tr>
                <th>Phone number</th>
                <td class="pull-right">{{$custormer->phone_nr}}</td>
                <td></td>
            </tr>
            <tr>
                <th>City</th>
                <td class="pull-right">{{$custormer->city}}</td>
                <td></td>
            </tr>
            <tr>
                <th>Adress</th>
                <td class="pull-right">{{$custormer->street}} {{$custormer->house_nr}}</td>
                <td></td>
            </tr>
            <tr>
                <th>Bank account</th>
                <td class="pull-right">{{ $custormer->bank_acount }}</td>
                <td></td>
            </tr>
            <tr>
                <th>Credible</th>
                <td class="pull-right">
                    @if($custormer->credible == 'T')
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>
                    <form action="{{ action('FinanceController@update', $custormer->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="credible" value="{{ $custormer->credible }}" >
                        <input type="hidden" name="id" value="{{ $custormer->id }}">
                        <button type="submit" class="btn btn-success pull-right">change credibility</button>
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
                <th></th>
                <th>Finished</th>
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
                    <form action="{{ action('FinanceController@setOngoing', $project->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="ongoing" value="{{ $project->ongoing }}">
                        <input type="hidden" name="id" value="{{ $project->id }}">
                        <button type="submit" class="btn btn-success">Set ongoing</button>
                    </form>
                </td>
                <td>
                    @if($project->done == 'T')
                        Project finished
                    @else
                        Project not finished
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection