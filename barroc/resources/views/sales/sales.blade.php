@extends('layouts.master')

@section('nav-links')
    <li><a href="custormer">Customers</a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
@endsection

@section('content')

<div class="container">
    <a href="{{action('custormerController@create')}}" class="btn-success btn"> Create customer</a>
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
@endsection
