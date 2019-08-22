<?php


use App\ReserveCustomer;

Auth::routes();

Route::get('/', function() { return view('login'); });

Route::get('/contactus', function() { return view('layouts.user.contactUs.frontcontactpage'); });
Route::get('/about', function() { return view('layouts.user.aboutanp.aboutamparo'); });
Route::get('/record', function() { return view('layouts.admin.records.records'); })->middleware('auth');
Route::get('/staff', function() { return view('layouts.admin.staffs.staffs-list'); })->middleware('auth');
Route::get('/evtcalendar', function() { return view('layouts.admin.event-calendar.display-calendar'); });
Route::get('/reserve', 'Staff\ReserveController@create')->name('reserve.create')->middleware('auth');
Route::get('/evtcalendar', 'Admin\EventCalendar@index');
Route::get('/actcalendar', 'Staff\EventCalendar@index');
Route::get('/', 'Admin\ReportController@displayAllRecords')->middleware('auth');
//Route::get('/', 'Admin\ReportController@showUpcomingEventsinStaff')->middleware('auth');


Route::get('checktimeavailable/{dateGiven}', function ($dateGiven){

    $checkInRecords = ReserveCustomer::where('date_request_occupy', $dateGiven)->get();
    if (count($checkInRecords) == 2) {
        return Response::json('Whole Day');
    }
    else{
      foreach($checkInRecords as $key => $value) {
        if ($value->time_request_occupy == 0) {
            $status = 'AM';
            return Response::json($status);
        } else if ($value->time_request_occupy == 1) {
            $status = 'PM';
            return Response::json($status);
        } else {

        }
      }
    }

});

Route::resource('reservation', 'Staff\ReserveController');
Route::resource('record', 'Admin\RecordController');
Route::resource('staff', 'Admin\StaffController');
Route::resource('reports', 'Admin\ReportController')->middleware('accessreports');
