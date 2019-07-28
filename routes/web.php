<?php

Route::get('/', function() { return view('home'); });
Route::get('/contactus', function() { return view('layouts.user.contactUs.frontcontactpage'); });
Route::get('/actcalendar', function() { return view('layouts.user.calendar.actcalendar'); });
Route::get('/about', function() { return view('layouts.user.aboutanp.aboutamparo'); });
Route::get('/record', function() { return view('layouts.admin.records.records'); })->middleware('auth');

Auth::routes();

Route::get('/reserve', 'ReserveController@create')->name('reserve.create')->middleware('auth');

Route::resource('reservation', 'ReserveController');
Route::resource('record', 'RecordController');
