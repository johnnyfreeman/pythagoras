<?php

Route::get('/grids', 'GridController@index')->name('grids.index');
Route::get('/grids/{grid}', 'GridController@show')->name('grids.show');
Route::get('/grids/{grid}/play', 'GridController@play')->name('grids.play');

Route::get('/grids/{grid}/play/{value}', 'GridController@show')->name('grids.play.value');
Route::post('/grids/{grid}/play/{value}', 'GridController@check')->name('grids.check');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
