<?php

Route::get('/', function () {
    return view('pages.home');
});

Route::get('exif',
    ['as' => 'exif', 'uses' => 'ExifController@create']);

Route::post('exif',
    ['as' => 'exif_store', 'uses' => 'ExifController@store']);

Route::get('infosec',
    ['as' => 'directory', 'uses' => 'DirectoryController@create']);

Route::get('feed',
    ['as' => 'feed', 'uses' => 'InfosecRssController@create']);

Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
