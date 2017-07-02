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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/MyAcount', function () {
    return view('my_acount');
});

Route::get('/Upload', function () {
	return view('upload');
});

Route::get('/MyAcount', 'ListController@show');

Route::get('/logout',function(){
	Auth::logout();
	return redirect('/');
});
Route::get('/home', 'HomeController@index');

//Route::get('/browse','UploadController@getdata');

Route::get("index","UploadController@index");
Route::post("store","UploadController@store");

Route::get('users/{id}/edit','UsersController@show');
Route::post('users/updated/{id}','UsersController@edit');

//Password resets
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/users/{user}','UsersController@getdata');

Route::get('/recipes/{user}','RecipeController@getdata');
Route::get('recipes/{id}/edit','RecipeController@show');

Route::post('recipes/updated/{id}','RecipeController@edit');

Route::get('/update',function(){
	return view('update');
});

Route::post('recipes/add_comment/{id}','CommentController@store');

Route::get('browse','UploadController@products');

Route::get('/search','UploadController@search');

Route::get('/contact',function(){
	return view('contact');
});