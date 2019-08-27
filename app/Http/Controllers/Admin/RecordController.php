<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    public function index()
    {
        $this->authorize('AdminOnlyAccess', Record::class);
        $fetchAllRecords = Record::orderBy('date_request_occupy', 'DESC')->paginate(10);
        return view('layouts.admin.records.record', compact('fetchAllRecords'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($get_record_id)
    {
        $this->authorize('AdminOnlyAccess', Record::class);
        $showSpecificRecord = Record::where('record_id', $get_record_id)->get();
        $reqfaci = unserialize($showSpecificRecord[0]->request_use_facilities);
        return view('layouts.admin.records/viewrecord', compact('showSpecificRecord', 'reqfaci'));
    }

    public function search(Request $request) {

      $data = $request->validate([
         'searchText' => 'required',
      ]);

      $searchText = trim($request->searchText);

      $fetchAllRecords = Record::where('requested_group', 'LIKE', '%'.$searchText.'%')
            ->orderBy('date_request_occupy', 'DESC')
            ->paginate(10);

      return view('layouts.admin.records.record', compact('fetchAllRecords', 'searchText'));
    }

    public function edit(Record $record)
    {
        //
    }

    public function update(Request $request, Record $record)
    {
        //
    }

    public function destroy(Record $record)
    {
        //
    }
}
