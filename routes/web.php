<?php

Route::get('/', function() { return view('home'); });
Route::get('/contactus', function() { return view('layouts.user.contactUs.frontcontactpage'); });

Route::get('/about', function() { return view('layouts.user.aboutanp.aboutamparo'); });
Route::get('/record', function() { return view('layouts.admin.records.records'); })->middleware('auth');
Route::get('/staff', function() { return view('layouts.admin.staffs.staffs-list'); })->middleware('auth');
Route::get('/evtcalendar', function() { return view('layouts.admin.event-calendar.display-calendar'); });

Auth::routes();

Route::get('/reserve', 'Staff\ReserveController@create')->name('reserve.create')->middleware('auth');

Route::get('/evtcalendar', 'Admin\EventCalendar@index');
Route::get('/actcalendar', 'Staff\EventCalendar@index');


Route::resource('reservation', 'Staff\ReserveController');
Route::resource('record', 'Admin\RecordController');
Route::resource('staff', 'Admin\StaffController');
