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
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth:web']], function () {
    // Route::get('/1111', 'PostController@guard');  
    Route::post('/post.user', 'PostController@user')->name('post.user');
    Route::resource('post', 'PostController');
    Route::resource('message','MessageController');
  
    // Route::get('/post', 'MessageController@create');
    // Route::get('/post','MessageController@index');
});
