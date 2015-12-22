<?php

Route::get('/', 'UserController@index');
Route::get('/user/login', 'UserController@index');
Route::post('/user/login', 'UserController@login');

Route::get('/user/register', 'UserController@register');
Route::post('/user/register', 'UserController@create');

Route::get('/user/profile', 'UserController@profile');
Route::post('/user/profile', 'UserController@update');

Route::get('/user/logout', 'UserController@logout');

Route::get('/user/delete/{id}', 'UserController@delete');
