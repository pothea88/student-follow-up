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

Route::get('logout', 'Admin\Auth\LoginController@logout')->name('logout');
// Route::group(['prefix'=>'login'], function(){
    Route::get('/', function () {
        return view('auth.login');
    });
// });


Auth::routes();
Route::post('/login', [
    'uses'          => 'Auth\LoginController@login',
    'middleware'    => 'checkstatus',
]);
Route::group(['prefix'=>'users'], function(){
    Route::get('/','admin\UserController@view')->name('view');
    Route::match(['GET', 'POST'], 'add', 'Admin\UserController@create');
    Route::match(['GET', 'POST'], 'edit/{id}', 'Admin\UserController@edit');
    Route::get('/mentor/{id}','admin\UserController@mentorStudent')->name('mentor');
});

Route::get('/show','StudentController@index');
Route::get('/add','StudentController@create');
Route::post('/addStudent','StudentController@store');
Route::get('/showEdit/{id}','StudentController@show')->name('showEdit');
Route::get('/detail/{id}','StudentController@detail')->name('detail');
Route::get('/viewComment/{id}','CommentController@showComment')->name('viewComment');
Route::get('/comment/{id}','CommentController@create')->name('comment');
Route::post('/comments/{id}','CommentController@store')->name('comments');
Route::get('/editComment/{id}','CommentController@edit')->name('editComment');
Route::patch('/updateComment/{id}','CommentController@update')->name('updateComment');
Route::get('/deleteComment/{id}','CommentController@destroy')->name('deleteComment');
Route::patch('/update/{id}','StudentController@update')->name('update');


Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin/allUser','admin\UserController@index')->name('admin/allUser');
