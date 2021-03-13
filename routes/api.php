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
Route::get('categories', 'NewsController@getCategories');
Route::get('/berita', 'NewsController@index');
Route::get('/searchBerita', 'NewsController@searchBerita');
Route::get('/allBerita', 'NewsController@show');
Route::put('/berita/{id}', 'AuthController@update');
Route::post('/berita', 'AuthController@addBerita');

Route::delete('/berita/{id}', 'AuthController@destroy');

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/user', 'AuthController@user');

Route::get('/penduduk', 'PendudukController@index');
Route::get('/penduduk/{nik}', 'PendudukController@show');
Route::get('/penduduk/{id}/getSurat', 'PendudukController@getSurat');
Route::delete('/penduduk/surat/{id}', 'PendudukController@deleteSurat');
Route::get('/PendudukSurat', 'PendudukController@getPendudukSurat');


Route::post('send-mail', 'MailController@sendTo'); 

// {
   
//     $details = [
//         'title' => 'Mail from Nicesnippets.com',
//         'body' => 'This is for testing email using smtp'
//     ];
   
//     \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyDemoMail($details));
   
//     dd("Email is Sent.");
// });