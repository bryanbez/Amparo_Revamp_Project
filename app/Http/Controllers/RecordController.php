<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;

class RecordController extends Controller
{

    public function index(){

      $fetchAllRecords = Record::all();
      return view('layouts.admin.records.records', compact('fetchAllRecords'));

    }
}
