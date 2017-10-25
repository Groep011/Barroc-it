@extends('layouts.master')

@section('nav-links')
    <li><a href="finance">Customers</a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
@endsection

@section('content')
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
        <table class="table table-striped">
        <thead>
            <tr>
                <th>naam</th>
                <th>adres</th>
                <th>credit</th>
                <th></th>
                <th>info</th>
            </tr>
        </thead>
            @foreach($custormers as $custormer)
            <tbody>
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
                            <button type="submit" class="btn btn-success">change credibility</button>
                        </form>
                    </td>
                    <td><button class="btn btn-default"><a href="{{ action('FinanceController@show', $custormer->id) }}">More info</a></button></td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection