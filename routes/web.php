<?php

use App\Http\Controllers;

Route::get('/', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', "PostsController@show");

Route::get('/contacts', function () {
    return view('contacts.index');
});
Route::post('/contacts', 'FeedbacksController@store');

Route::get('/admin/feedbacks', 'FeedbacksController@index');

Route::get('/about', function () {
    return view('about');
});