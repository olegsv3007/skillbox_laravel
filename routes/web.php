<?php

use App\Http\Controllers;

Route::get('/', 'PostsController@index');

Route::get('/tags/{tag}', 'TagsController@index');

Route::resource('/posts', 'PostsController');

Route::resource('/news', 'NewsController');

Route::post('/comments', 'CommentsController@send');

Route::get('/contacts', function () {
    return view('contacts.index');
});
Route::post('/contacts', 'FeedbacksController@store');

Route::get('/about', function () {
    return view('about');
});

Route::get('/admin/statistics', 'AdminController@statistics');

Route::middleware('auth.admin')->group(function () {
    Route::get('/admin/feedbacks', 'FeedbacksController@index');
    Route::get('/admin/posts', 'PostsController@adminIndex');
    Route::get('/admin/posts/{post}/edit', 'PostsController@adminEdit');
    Route::put('/admin/posts/{post}', 'PostsController@update');
});

Route::auth();
