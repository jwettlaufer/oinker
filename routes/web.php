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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users', 'HomeController@users')->name('users');
Route::get('user/{id}', 'HomeController@user')->name('user.view');
Route::post('follow', 'HomeController@follwUserRequest')->name('follow');

Route::get('comment/like/{id}', ['as' => 'comment.like', 'uses' => 'LikeController@likeComment']);
Route::get('oink/like/{id}', ['as' => 'oink.like', 'uses' => 'LikeController@likePost']);;

Route::resource('oinks', 'OinkController');

Route::resource('profile', 'ProfileController');

Route::resource('comment', 'CommentController');

Route::post('/comment/store', 'CommentController@store')->name('comment.add');

Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
/*
Route::delete('/comment/{id}', 'CommentController@destroy')->name('comment.destroy');

Route::get('/comment/{id}', 'CommentController@edit')->name('comment.edit');

Route::post('/comment/{id}', 'CommentController@update')->name('comment.update');
*/

Route::get('post/like/{id}', ['as' => 'post.like', 'uses' => 'LikeController@likePost']);

Route::get('comment/like/{id}', ['as' => 'comment.like', 'uses' => 'LikeController@likeComment']);
