<?php

use App\Post;
use App\Feedbacks;

Route::get('/', function () {
    $posts = Post::Latest()->get(['id','title', 'short_description', 'created_at']);
    return view('welcome', compact( 'posts'));
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::get('/posts', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');

Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::patch('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');



Route::get('/contacts', 'FeedbacksController@index');
Route::post('/admin/feedbacks', 'FeedbacksController@store');
Route::get('/admin/feedbacks', 'FeedbacksController@show');


Auth::routes();

