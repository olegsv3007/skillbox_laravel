<?php

use App\Http\Controllers;
use Illuminate\Http\Request;

Route::get('/', 'PostsController@index')->name('index');

Route::get('/tags/{tag}', 'TagsController@index')->name('tags.index');

Route::resource('/posts', 'PostsController');

Route::resource('/news', 'NewsController');

Route::post('/posts/{post}/comments', 'PostsController@sendComment')->name('posts.comment.send');

Route::post('/news/{news}/comments', 'NewsController@sendComment')->name('news.comment.send');

Route::get('/contacts', function () {
    return view('contacts.index');
})->name('contacts');

Route::post('/contacts', 'FeedbacksController@store')->name('feedback.send');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/admin/statistics', 'AdminController@statistics')->name('statistics');
Route::get('/admin/reports', 'AdminController@reports')->name('reports');
Route::get('/admin/reports/summary', 'AdminController@summary')->name('summary');

Route::post('/admin/reports/summary', 'AdminController@sendSummaryReport')->name('report-summary');

Route::middleware('auth.admin')->group(function () {
    Route::get('/admin/feedbacks', 'FeedbacksController@index')->name('admin.feedbacks');
    Route::get('/admin/posts', 'PostsController@adminIndex')->name('admin.posts.index');
    Route::get('/admin/posts/{post}/edit', 'PostsController@adminEdit')->name('admin.posts.edit');
    Route::put('/admin/posts/{post}', 'PostsController@update')->name('admin.posts.update');
});

Route::auth();
