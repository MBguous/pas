<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::group(array(), function(){
	Route::get('login', array('as' => 'login','uses' => 'AuthController@getLogin'));
	Route::post('login', array('as' => 'login.post', 'uses' => 'AuthController@postLogin'));
	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

});
Route::group(array('before' => 'auth'), function(){
	Route::get('home', array('as' => 'home', 'uses' => 'HomeController@index'));
	Route::resource('employees', 'EmployeesController');
	Route::get('employees/search', array('as' => 'employees.search', 'uses' => 'EmployeesController@search'));
	Route::resource('attendances', 'AttendancesController');
	Route::resource('rosters', 'RostersController');
	Route::get('reports', array('as' => 'reports.index', 'uses' => 'ReportsController@index'));
	Route::post('reports', array('as' => 'reports.post', 'uses' => 'ReportsController@generate'));
});

Event::listen('404', function(){
	return Response::error('404');
});

Event::listen('500', function(){
	return Response::error('500');
});

Route::get('/', function(){
	$pdf = App::make('dompdf');
	$pdf->loadHTML('<h1>Test</h1>');
	return $pdf->stream();
});

// Display all SQL executed in Eloquent
// Event::listen('illuminate.query', function($query)
// {
//   var_dump($query);
//});

// Event::listen('laravel.query', function($sql){
// 	var_dump($sql);
// });