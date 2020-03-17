<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home' , function(){
    return view('home');
})->name('home');

Route::resource('/category','CategoryController');
Route::resource('/tag', 'TagsController');
Route::get('/post/trash', 'PostsController@trash')->name('post.trash');
Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');
Route::delete('/post/kill/{id}', 'PostsController@kill')->name('post.kill');
Route::resource('/post', 'PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
