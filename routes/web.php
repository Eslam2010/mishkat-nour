<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(\route('web.main'));
});


Route::get('test', function () {
    return view('layouts.Web_app');
});

Route::get('laravel', function () {
    return view('Post_view');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('Web')->group(function (){

    Route::get('/Main','Web\Main\MainController@index')->name('web.main');

    Route::get('/ContactUs','Web\Msg\MsgController@send')->name('web.msg');
    Route::post('/ContactUs','Web\Msg\MsgController@send')->name('web.msg');

    Route::get('/Profile','Auth\ProfileCont@update')->name('web.profile');
    Route::post('/Profile','Auth\ProfileCont@update')->name('web.profile');

    Route::prefix('Section')->group(function () {
        Route::get('/{id}','Web\Section\Section_Cont@index')->name('web.section.index');

    });

    Route::prefix('Post')->group(function () {
        Route::get('/{id}','Web\Post\Post_Cont@index')->name('web.post.index');
        Route::post('/{id}','Web\Post\Post_Cont@index')->name('web.post.index');

        Route::get('/Comment/{id}','Web\Post\Post_Cont@editComment')->name('web.comment.edit');
        Route::Post('/Comment/{id}','Web\Post\Post_Cont@editComment')->name('web.comment.edit');

        Route::get('/Comment/Delete/{id}','Web\Post\Post_Cont@deleteComment')->name('web.comment.delete');

    });
});


Route::prefix('Admin')->middleware('adminPanel')->group(function (){
    Route::get('/Main','Admin\Main\MainController@index')->name('main.index');
    Route::prefix('Section')->middleware('adminRole')->group(function (){


        Route::get('/','Admin\Section\SectionController@index')->name('section.index');

        Route::get('Add','Admin\Section\SectionController@add')->name('section.add');
        Route::post('Add','Admin\Section\SectionController@add')->name('section.add');

        Route::get('Update/{id}','Admin\Section\SectionController@update')->name('section.update');
        Route::post('Update/{id}','Admin\Section\SectionController@update')->name('section.update');

        Route::get('Delete/{id}','Admin\Section\SectionController@delete')->name('section.delete');
        Route::post('Delete/{id}','Admin\Section\SectionController@delete')->name('section.delete');

    });

    Route::prefix('Image')->group(function (){
        Route::get('/','Admin\Image\ImageController@index')->name('image.index');

        Route::get('Add','Admin\Image\ImageController@add')->name('image.add');
        Route::post('Add','Admin\Image\ImageController@add')->name('image.add');

        Route::get('Delete/{id}','Admin\Image\ImageController@delete')->name('image.delete');
        Route::post('Delete/{id}','Admin\Image\ImageController@delete')->name('image.delete');

    });

    Route::prefix('Post')->group(function (){
        Route::get('/','Admin\Post\PostController@index')->name('post.index');


        Route::get('Add','Admin\Post\PostController@add')->name('post.add');
        Route::post('Add','Admin\Post\PostController@add')->name('post.add');

        Route::get('Update/{id}','Admin\Post\PostController@update')->name('post.update');
        Route::post('Update/{id}','Admin\Post\PostController@update')->name('post.update');

        Route::get('Delete/{id}','Admin\Post\PostController@delete')->name('post.delete');
        Route::post('Delete/{id}','Admin\Post\PostController@delete')->name('post.delete');

    });

    Route::prefix('User')->group(function (){
        Route::get('/','Admin\User\UserController@index')->name('user.index');

        Route::get('Add','Admin\User\UserController@add')->name('user.add');
        Route::post('Add','Admin\User\UserController@add')->name('user.add');

        Route::get('Update/{id}','Admin\User\UserController@update')->name('user.update');
        Route::post('Update/{id}','Admin\User\UserController@update')->name('user.update');

        Route::get('Delete/{id}','Admin\User\UserController@delete')->name('user.delete');
        Route::post('Delete/{id}','Admin\User\UserController@delete')->name('user.delete');

    });


    Route::prefix('Msg')->group(function (){
        Route::post('Delete/{id}','Admin\Msg\MsgController@delete')->name('msg.delete');

        Route::get('/read/{id}','Admin\Msg\MsgController@read')->name('msg.read');
        Route::get('/{type}','Admin\Msg\MsgController@index')->name('msg.index');

    });


});
