<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// =============================================

// Route::group(['middleware' => 'auth:api'], function(){
//     // Users
//     Route::get('users', 'UserController@index')->middleware('isAdmin');
//     Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
// });


// =============================================
Route::get('/berita', 'NewsController@index');
Route::get('/searchBerita', 'NewsController@searchBerita');
Route::get('/allBerita', 'NewsController@show');
Route::put('/berita/{id}', 'AuthController@update');
Route::post('/berita', 'AuthController@addBerita');

Route::delete('/berita/{id}', 'AuthController@destroy');

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/user', 'AuthController@user');

