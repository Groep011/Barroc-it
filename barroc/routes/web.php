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


Route::resource('custormer', 'custormerController');
Route::resource('project', 'ProjectController');
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::resource('log', 'LogController');

Route::get('addproject/{id}', function($id)
{
    $custormer = \App\model\Custormer::find($id);
    return view('sales.addproject', compact('custormer'));
});

Route::get('develepment/search','DevelepmentController@search')->name('develepment.search');
Route::Post('develepment/search','DevelepmentController@results')->name('develepment.search.item');
Route::resource('develepment', 'DevelepmentController');


Route::get('/search', 'FinanceController@results');
Route::post('/search', 'FinanceController@results');
Route::resource('/finance', 'FinanceController');
Route::put('/finance/{id}/done', 'FinanceController@updateProject');
Route::put('/finance/{id}/ongoing', 'FinanceController@setOngoing');