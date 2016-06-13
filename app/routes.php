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

Route::get('/', 'HomeController@landingpage');
Route::get('/about', 'HomeController@about');
Route::get('/signup', 'HomeController@showsignup');
Route::post('/signup', 'HomeController@dosignup');
Route::get('/login', 'HomeController@showlogin');
Route::post('/login', 'HomeController@dologin');
Route::get('/profile/{id}', 'UsersController@profile');
Route::get('/events', 'EventsController@index');
Route::get('/plan', 'EventsController@showsetup');
Route::post('/plan', 'EventsController@dosetup');
Route::get('/plan/{id}/inventory', 'EventsController@showdrink');
Route::post('/plan/{id}/inventory', 'EventsController@adddrink');
Route::get('/plan/{id}/invite', 'EventsController@showinvite');
Route::post('/plan/{id}/invite', 'EventsController@sendinvite');
Route::get('/plan/{id}/serve', 'EventsController@showserve');
Route::post('/plan/{id}/serve', 'EventsController@doserve');
