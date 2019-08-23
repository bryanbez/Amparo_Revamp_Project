<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;

use App\ReserveCustomer;
use App\Record;
use Illuminate\Http\Request;


class ReserveController extends Controller
{

    public function index()
    {
        $this->authorize('view', ReserveCustomer::class);
        $allreservation = ReserveCustomer::all();
        foreach ($allreservation as $key => $value) {
           if ($value->date_request_occupy < date('Y-m-d')) {
             // Insert in records
             $transferToRecords = new Record();
             $transferToRecords->request_form_no = $value->request_form_no;
             $transferToRecords->date_request_occupy = $value->date_request_occupy;
             $transferToRecords->time_request_occupy = $value->time_request_occupy;
             $transferToRecords->request_use_facilities = $value->request_use_facilities;
             $transferToRecords->requested_group = $value->requested_group;
             $transferToRecords->requested_group_contact = $value->requested_group_contact;
             $transferToRecords->requested_group_email = $value->requested_group_email;
             $transferToRecords->people_count = $value->people_count;
             $transferToRecords->reserve_purpose = $value->reserve_purpose;
             $transferToRecords->reserve_status = $value->reserve_status;
             $transferToRecords->save();
             // Delete in reservation
             $deleteInReservation = ReserveCustomer::where('date_request_occupy', $value->date_request_occupy)->delete();

           }
        }
        return view('layouts.admin.manage-reservation.fetch-list', compact('allreservation'));
    }

    public function create()
    {
        $this->authorize('create', ReserveCustomer::class);
        // Whole Day
        $showDateReserved = ReserveCustomer::select('date_request_occupy')->where('time_request_occupy', 2)->get();
        $toDataArray = array();
        foreach($showDateReserved as $value) {
          $toDataArray[] = $value->date_request_occupy;
        }
        $checkAmPmDate = ReserveCustomer::select('date_request_occupy')->groupBy('date_request_occupy')->havingRaw('count(date_request_occupy) > 1')->get();
        foreach($checkAmPmDate as $value) {
          $toDataArray[] = $value->date_request_occupy;
        }
        return view('layouts.user.reserve.create', compact('toDataArray'));
    }

    // public function validateInputs() {


    // }

    public function store(Request $request)
    {
        $this->authorize('AdminOnlyAccess', ReserveCustomer::class);
        $data = $request->validate([
            // 'reqformno' => 'required',
             'datereq' => 'required',
             'timereq' => 'required',
             'reqfaci' => 'required',
             'groupname' => 'required',
             'groupcontact' => 'required',
             'groupemail' => 'required',
             'peoplecount' => 'required',
             'reservepurpose' => 'required',
             // 'reqstatus' => 'required',
         ]);

        $saveReservation = new ReserveCustomer();
        $saveReservation->request_form_no = rand(10000, 1000000);
        $saveReservation->date_request_occupy = $request->datereq;
        $saveReservation->time_request_occupy = $request->timereq;
        $saveReservation->request_use_facilities = serialize($request->reqfaci);
        $saveReservation->requested_group = $request->groupname;
        $saveReservation->requested_group_contact = $request->groupcontact;
        $saveReservation->requested_group_email = $request->groupemail;
        $saveReservation->people_count = $request->peoplecount;
        $saveReservation->reserve_purpose = $request->reservepurpose;
        $saveReservation->reserve_status = 0;

         $saveReservation->save();

         return redirect('/reserve')->with('reserve-message', 'Successfully Reserved');

    }

    public function show($request_form_no)
    {
        $this->authorize('view', ReserveCustomer::class);
        $showspecificreservation = ReserveCustomer::where('request_form_no', $request_form_no)->get();
        $reqfaci = unserialize($showspecificreservation[0]->request_use_facilities);
        return view('layouts.admin.manage-reservation.view-more', compact('showspecificreservation', 'reqfaci'));

    }


    public function edit($request_form_no)
    {
      $this->authorize('view', ReserveCustomer::class);
      $showspecificreservation = ReserveCustomer::where('request_form_no', $request_form_no)->get();
      $reqfaci = unserialize($showspecificreservation[0]->request_use_facilities);

      return view('layouts.admin.manage-reservation.edit-reservation', compact('showspecificreservation', 'reqfaci'));
  //  dd($showspecificreservation);
    }

    public function update(Request $request, ReserveCustomer $reserveCustomer, $request_form_no)
    {
      $this->authorize('AdminOnlyAccess', ReserveCustomer::class);
      $data = $request->validate([
           // 'reqformno' => 'required',
           'datereq' => 'required',
           'timereq' => 'required',
           'reqfaci' => 'required',
           'groupname' => 'required',
           'groupcontact' => 'required',
           'groupemail' => 'required',
           'peoplecount' => 'required',
           'reservepurpose' => 'required',
           'reqstatus' => 'required',
       ]);

        $reserveCustomer::where('request_form_no', $request_form_no)->update([
          'date_request_occupy' => $request->datereq,
          'time_request_occupy' => $request->timereq,
          'request_use_facilities' => serialize($request->reqfaci),
          'requested_group' => $request->groupname,
          'requested_group_contact' => $request->groupcontact,
          'requested_group_email' => $request->groupemail,
          'people_count' => $request->peoplecount,
          'reserve_purpose' => $request->reservepurpose,
          'reserve_status' => $request->reqstatus,
          'updated_at' => date('Y-m-d G:i:s')
        ]);

        return $this->index();

    }

    // public function destroy(ReserveCustomer $reserveCustomer)
    // {
    //     //
    // }
}
