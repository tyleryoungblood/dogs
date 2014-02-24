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

/*
|--------------------------------------------------------------------------
| The Overview Page (pg 42 of Getting Started with Laravel 4)
|--------------------------------------------------------------------------
|
| The index page that will display all dogs using dogs.index view. Note:
| use dogs.index and not dogs/index to refer to a view inside a subfolder.
|
*/

Route::get('dogs', function(){
    $dogs = Dog::all();
    return View::make('dogs.index')
        ->with('dogs', $dogs);
});

Route::get('dogs/breeds/{name}', function($name){
    $breed = Breed::whereName($name)->with('dogs')->first(); // whereName is equivalent to WHERE name = $name, first() retrieves the first instance
    return View::make('dogs.index')
        ->with('breed', $breed)
        ->with('dogs', $breed->dogs);
});

/*
|--------------------------------------------------------------------------
| Displaying a dog's Page (pg 43 of Getting Started with Laravel 4)
|--------------------------------------------------------------------------
|
| Using Eloquent's find() method to display a dog by it's ID
|
*/

Route::get('dogs/{id}', function($id) {
    $dog = Dog::find($id);
    return View::make('dogs.single')
        ->with('dog', $dog);
});

Route::model('dog', 'Dog');

Route::get('dogs/{dog}', function(Dog $dog) {
    return View::make('dogs.single')
        ->with('dog', $dog);
});


/*
|--------------------------------------------------------------------------
| Adding, Editing, and Deleting Dogs (pg 44 of Getting Started with Laravel 4)
|--------------------------------------------------------------------------
|
| Using Eloquent's find() method to display a dog by it's ID
|
*/

Route::get('dogs/create', function(){
    $dog = new Dog;
    return View::make('dogs.edit')
        ->with('dog', $dog)
        ->with('method', 'post');
});



