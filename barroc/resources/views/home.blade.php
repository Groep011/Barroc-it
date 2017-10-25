@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <?php
                                
                            if(LevelCheck::Check(4))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm');
                            if(LevelCheck::Check(2))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm');
                            if(LevelCheck::Check(1))return redirect()->action('\App\Http\Controllers\Auth\LoginController@showLoginForm');
                            ?>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
