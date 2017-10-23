<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('custormer', 'custormerController');
Route::resource('project', 'ProjectController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('log', 'LogController');

Route::get('addproject/{id}', function($id)
{
    $custormer = \App\Custormer::find($id);
    return view('sales.addproject', compact('custormer'));
});