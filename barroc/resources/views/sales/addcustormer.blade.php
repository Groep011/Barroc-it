@extends('layouts.master')

@section('nav-links')
    <li><a href="custormer">Customers</a></li>
    <li><a href=""></a></li>
    <li><a href=""></a></li>
@endsection

@section('content')
<div class="container">

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <h1>Add customer</h1>
        <a href="help" class="help-block">?</a>
    <form action="/custormer" method="post">
        <div class="form-group">
            {{csrf_field()}}
            <input type="text" name="Name" id="name" placeholder="Company Name" class="form-control">
        </div>
        <div class="form-group">
            <input type="number" name="Phonenumber" id="phonenumber" placeholder="Phonenumber" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="City" id="city" placeholder="City" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="Street" id="street" placeholder="Street" class="form-control">
        </div>
        <div class="form-group">
            <input type="number" name="housenumber" id="housenumber" placeholder="House Number" class="form-control">
        </div>
        <div class="form-group">
            <input type="tel" name="bankaccount" id="bankaccount" placeholder="Bank Account Number" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn-sm">
        </div>
    </form>
</div>

@endsection
