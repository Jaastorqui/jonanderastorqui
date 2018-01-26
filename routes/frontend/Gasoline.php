<?php

Route::get('/gasolines/{town}', 'GasolineController@index')->name('gasoline.index');


Route::get('/provinces',  'ProvincesController@index')->name('province.index');

Route::resource('towns', 'TownsController');