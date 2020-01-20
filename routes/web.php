<?php

/* Tasks */
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

/* Album */
Route::get('/album', 'PostsController@albumIndex');
Route::get('/album/{picture}', 'PostsController@albumShow');


/* Blog / Posts */
Route::get('/', 'PostsController@blogIndex')->name('home');
Route::get('/posts/create', 'PostsController@blogCreate');
Route::post('/posts', 'PostsController@blogStore');
Route::get('/posts/{post}', 'PostsController@blogShow');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');