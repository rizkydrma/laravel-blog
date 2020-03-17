<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/category','CategoryController');
    Route::resource('/tag', 'TagsController');
    Route::get('/post/trash', 'PostsController@trash')->name('post.trash');
    Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');
    Route::delete('/post/kill/{id}', 'PostsController@kill')->name('post.kill');
    Route::resource('/post', 'PostsController');
    Route::resource('/user', 'UsersController');
});
