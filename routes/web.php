<?php

use App\Http\Controllers;

Route::get('/', 'PostsController@index')->name('index');

Route::get('/tags/{tag}', 'TagsController@index')->name('tags.index');

Route::resource('/posts', 'PostsController');

Route::resource('/news', 'NewsController');

Route::post('/comments', 'CommentsController@send')->name('comment.send');

Route::get('/contacts', function () {
    return view('contacts.index');
})->name('contacts');

Route::post('/contacts', 'FeedbacksController@store')->name('feedback.send');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/admin/statistics', 'AdminController@statistics')->name('statistics');

Route::middleware('auth.admin')->group(function () {
    Route::get('/admin/feedbacks', 'FeedbacksController@index')->name('admin.feedbacks');
    Route::get('/admin/posts', 'PostsController@adminIndex')->name('admin.posts.index');
    Route::get('/admin/posts/{post}/edit', 'PostsController@adminEdit')->name('admin.posts.edit');
    Route::put('/admin/posts/{post}', 'PostsController@update')->name('admin.posts.update');
});

Route::auth();
