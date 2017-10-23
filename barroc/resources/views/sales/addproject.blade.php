@extends('layouts.master')

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

        <form action="/custormer" method="post">
            <div class="form-group">
                {{csrf_field()}}
                <input type="hidden" value="{{$custormer->id}}">
                <input type="text" name="Name" id="name" placeholder="Project Name" class="form-control">
            </div>
            <div class="form-group">
                <input type="number" name="maxdebt" id="maxdebt" placeholder="Max debt for Project" class="form-control">
            </div>
        </form>
    </div>

@endsection
