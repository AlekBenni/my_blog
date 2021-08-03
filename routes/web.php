<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function(){
    Route::resource('/index', 'MainController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/tag', 'TagController');
    Route::resource('/post', 'PostController');
});

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', 'UserController@create')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});


Route::get('/logout', 'UserController@logout')->name('logout');
