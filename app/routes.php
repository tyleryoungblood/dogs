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

Route::get('/', function(){
    return "All dogs";
});

Route::get('dogs/{id}', function($id){ // 1st param is URI pattern, if matched closure fun is executed
    return "Dog #$id";
}) ->where('id', '[0-9]+'); // limit id to numbers via regex

/*
|--------------------------------------------------------------------------
| Handling redirects (pg 35 of Getting Started with Laravel 4)
|--------------------------------------------------------------------------
|
| Redirect visitors by returning a Redirect obj from your routes.
|
*/

Route::get('/', function(){
    return Redirect::to('dogs');
});

Route::get('dogs', function(){
    return "All Dogs";
});

Route::get('about', function(){
    return View::make('about')->with('number_of_dogs', 9000);
});

