<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ReserveCustomer;
use App\Record;
use Carbon\Carbon;

class ReportController extends Controller
{

    public function index() {
      return view('layouts.admin.reports.view-report');
    }

    public function displayTotalReservation() {

    }

    public function displayUpcomingReservation() {
      $getTotalUpcoming = ReserveCustomer::all()->count();
      $getTodayReservation = ReserveCustomer::whereDate('created_at', '=', Carbon::now()->toDateString())->count();
      $getThisMonthReservation = ReserveCustomer::whereMonth('created_at', '=', Carbon::now()->month)->count();
      $getThisYearReservation = ReserveCustomer::whereYear('created_at', '=', Carbon::now()->year)->count();

      $getDoneEvents = Record::where('reserve_status', 'Approved')->count();
      $getCancelledEvents = Record::where('reserve_status', 'Cancelled')->count();
     //dd($getThisYearReservation);

     $getallCurrReservation = ReserveCustomer::all()->count();
     $getallRecords = Record::all()->count();
     $totalCount = $getallCurrReservation + $getallRecords;
      return view('layouts.admin.reports.view-report', compact('getTotalUpcoming', 'getTodayReservation', 'getThisMonthReservation', 'getThisYearReservation', 'getDoneEvents', 'getCancelledEvents', 'totalCount'));
    }

}
