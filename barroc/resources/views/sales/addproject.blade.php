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
        <h1>Add Project</h1>

        <form action="/project" method="post">
            <div class="form-group">
                {{csrf_field()}}
                <input type="hidden" value="{{$custormer->id}}" name="id">
                <input type="text" name="Name" id="name" placeholder="Project Name" class="form-control">
            </div>
            <div class="form-group">
                <input type="number" name="maxdebt" id="maxdebt" placeholder="Max debt for Project" class="form-control">
            </div>
            <div class="form-group">
                <textarea name="note" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn-sm">
            </div>
        </form>
    </div>

@endsection
