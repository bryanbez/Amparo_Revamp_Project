<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ReserveCustomer;
use App\Record;
use Carbon\Carbon;
use PdfReport;

class ReportController extends Controller
{

    public function displayAllRecords() {
      $getTotalUpcoming = ReserveCustomer::all()->count();
      $getTodayReservation = ReserveCustomer::whereDate('created_at', '=', Carbon::now()->toDateString())->count();
      $getThisMonthReservation = ReserveCustomer::whereMonth('created_at', '=', Carbon::now()->month)->count();
      $getThisYearReservation = ReserveCustomer::whereYear('created_at', '=', Carbon::now()->year)->count();
      $getDoneEvents = Record::where('reserve_status', 'Approved')->count();
      $getCancelledEvents = Record::where('reserve_status', 'Cancelled')->count();
      $getallCurrReservation = ReserveCustomer::all()->count();
      $getallRecords = Record::all()->count();
      $totalCount = $getallCurrReservation + $getallRecords;
      $dateToday = Carbon::now()->toDateString();
      //$getUpcomingEvent = ReserveCustomer::orderBy('date_request_occupy')->skip(0)->take(3)->get();
      $getUpcomingEvent = ReserveCustomer::where('date_request_occupy', '>', Carbon::now()->toDateString())->orderBy('date_request_occupy')->skip(0)->take(3)->get();
      $getUpdatedRecordsinReservation = ReserveCustomer::orderBy('updated_at', 'DESC')->skip(0)->take(3)->get();
      $getTodayEventOnGoing = ReserveCustomer::whereDate('date_request_occupy', '=', Carbon::now()->toDateString())->get();
    //  dd($getTodayEventOnGoing);
      return view('home', compact('getTotalUpcoming', 'getTodayReservation',
              'getThisMonthReservation', 'getThisYearReservation',
              'getDoneEvents', 'getCancelledEvents', 'totalCount',
              'dateToday', 'getUpcomingEvent', 'getUpdatedRecordsinReservation',
              'getTodayEventOnGoing'));
    }

    public function generateUpcomingReport() {
      $title = 'Amparo Nature Park';
      $meta = [
          'Report as of '.Carbon::now()->toDateString(),
          'Upcoming Events as of this Month',
       ];

       $queryBuilder = ReserveCustomer::whereMonth('date_request_occupy', '=', Carbon::now()->month)->select('request_form_no', 'date_request_occupy', 'time_request_occupy', 'requested_group', 'reserve_purpose', 'reserve_status')->orderBy('created_at', 'DESC');
       $columns = [ // Set Column to be displayed
          'Request Form No' => 'request_form_no',
          'Date Request Occupy' => 'date_request_occupy',
          'Time Schedule' => 'time_request_occupy',
          'Requested Group' => 'requested_group',
          'Reserve Purpose' => 'reserve_purpose',
          'Reserve Status' => 'reserve_status'
       ];
      return PdfReport::of($title, $meta, $queryBuilder, $columns)->stream();
    }

    public function generateDoneEventsReport() {
      $title = 'Amparo Nature Park';
      $meta = [
          'Report as of '.Carbon::now()->toDateString(),
          'Done Events',
       ];

       $queryBuilder = Record::select('request_form_no', 'date_request_occupy', 'time_request_occupy', 'requested_group', 'reserve_purpose', 'reserve_status')->orderBy('date_request_occupy', 'DESC');
       $columns = [ // Set Column to be displayed
          'Request Form No' => 'request_form_no',
          'Date Request Occupy' => 'date_request_occupy',
          'Time Schedule' => 'time_request_occupy',
          'Requested Group' => 'requested_group',
          'Reserve Purpose' => 'reserve_purpose',
          'Reserve Status' => 'reserve_status'
       ];
      return PdfReport::of($title, $meta, $queryBuilder, $columns)->stream();
    }

    public function generateReservationList() {
      $title = 'Amparo Nature Park';
      $meta = [
          'Report as of '.Carbon::now()->toDateString(),
          'Reservation List',
       ];

       $queryBuilder = ReserveCustomer::select('created_at','request_form_no', 'date_request_occupy', 'time_request_occupy', 'requested_group', 'reserve_purpose', 'reserve_status')->orderBy('created_at', 'DESC');
       $columns = [ // Set Column to be displayed
          'Reserve Date' => 'created_at',
          'Request Form No' => 'request_form_no',
          'Date Request Occupy' => 'date_request_occupy',
          'Time Schedule' => 'time_request_occupy',
          'Requested Group' => 'requested_group',
          'Reserve Purpose' => 'reserve_purpose',
          'Reserve Status' => 'reserve_status'
       ];
      return PdfReport::of($title, $meta, $queryBuilder, $columns)->stream();
    }

}
