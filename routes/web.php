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

Route::get('/', 'BlogController@index');

Route::get('/post/{id}', 'PostController@index');

Route::get('/create', 'PostController@create');
Route::post('/save', 'PostController@store');
Route::get('/edit/{id}', 'PostController@edit');
Route::get('/delete/{id}', 'PostController@delete');

Route::get('/posts', 'PostController@getPostsByUserId')->middleware('auth');
Route::get('/profile', 'ProfileController@profile');

Route::get('/category/{id}', 'CategoryController@getCategoriesPosts');

Auth::routes();




