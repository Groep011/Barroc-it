@extends('layouts/develepment')

@section('nav-links')
<li><a href="/develepment">projecten</a></li>
<li><a href="/develepment/search">Search</a></li>
@endsection

@section('title')
<h2 class='col-xs-offset-2'>Projecten Search</h2>
    <hr>
    <form action="/develepment/search" class="col-xs-10 col-xs-offset-1" method="post">
        <div class="group-form">
            <input type="checkbox" name="ongoing">
            <label for="ongoing">Ongoing projects</label>
        </div>
        <div class="group-form">
            <input type="checkbox" name="done">
            <label for="done">Done projects</label>
        </div>
        <div class="group-form">
            <input type="checkbox" name="name">
            <input type="text" name='name-text' placeholder='Enter your project Name'>
        </div>
        <div class='group-form'>
            <input type="submit" class='btn btn-primary' value='Search'>  
        </div>
    </form>
    <hr>
@endsection

@section('main-content')
@endsection

@section('scripts')
@endsection