<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
    return view('pages.about');
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/create', 'PagesController@create');

/*
Route::post('/create', [
    'uses' => 'PostsController@store',
    'as' => 'post.store'
]);

Route::post('/update/{id}', [
    'uses' => 'PostsController@update',
    'as' => 'post.update'
]);

*/

// routes for the controllers 
Route::resource('posts', 'PostsController');

Route::auth();

Route::get('/home', 'HomeController@index');
