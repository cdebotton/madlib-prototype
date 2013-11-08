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

Route::group(['prefix' => 'api/1'], function()
{
  Route::resource('filters', 'Api\V1\FiltersController');
  Route::resource('groups', 'Api\V1\GroupsController');
});

Route::get('/', function()
{
	return View::make('hello');
});
