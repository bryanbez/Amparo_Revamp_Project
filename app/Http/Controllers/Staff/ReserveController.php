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
        $allreservation = ReserveCustomer::paginate(10);

        foreach ($allreservation as $key => $value) {
            if($value->reserve_status == 'Approved' || $value->reserve_status == 'Rejected') {
              // Move to Records
                $addRecord = new Record();
                $addRecord->request_form_no = $value->request_form_no;
                $addRecord->date_request_occupy = $value->date_request_occupy;
                $addRecord->time_request_occupy = $value->time_request_occupy;
                $addRecord->request_use_facilities = $value->request_use_facilities;
                $addRecord->requested_group = $value->requested_group;
                $addRecord->requested_group_contact = $value->requested_group_contact;
                $addRecord->requested_group_email = $value->requested_group_email;
                $addRecord->people_count = $value->people_count;
                $addRecord->reserve_purpose = $value->reserve_purpose;
                $addRecord->reserve_status = $value->reserve_status;
                $addRecord->save();

                // Delete Data from reservation
                $deleteReserve = new ReserveCustomer();
                $deleteReserve::where('request_form_no', $value->request_form_no)->delete();

            }
        }

        return view('layouts.admin.manage-reservation.fetch-list', compact('allreservation'));
    }

    public function create()
    {
        // Whole Day
        $showDateReserved = Record::select('date_request_occupy')->where('time_request_occupy', 2)->get();
        $toDataArray = array();
        foreach($showDateReserved as $value) {
          $toDataArray[] = $value->date_request_occupy;
        }
        //AM
        $showAmReserve = Record::select('date_request_occupy')->where('time_request_occupy', 0)->get();
        $amDateArray = array();
        foreach($showAmReserve as $value) {
          $amDateArray[] = $value->date_request_occupy;
        }

        return view('layouts.user.reserve.create', compact('toDataArray', 'amDateArray'));
    }

    // public function validateInputs() {


    // }

    public function store(Request $request)
    {

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

        $checkIfAlreadyReserved = ReserveCustomer::where('date_request_occupy', $request->datereq)->get();
        dd($checkIfAlreadyReserved);
        // $saveReservation = new ReserveCustomer();
        // $saveReservation->request_form_no = rand(4, 8);
        // $saveReservation->date_request_occupy = $request->datereq;
        // $saveReservation->time_request_occupy = $request->timereq;
        // $saveReservation->request_use_facilities = serialize($request->reqfaci);
        // $saveReservation->requested_group = $request->groupname;
        // $saveReservation->requested_group_contact = $request->groupcontact;
        // $saveReservation->requested_group_email = $request->groupemail;
        // $saveReservation->people_count = $request->peoplecount;
        // $saveReservation->reserve_purpose = $request->reservepurpose;
        // $saveReservation->reserve_status = 0;
        //
        //  $saveReservation->save();

         return redirect('/reserve');

    }

    public function show($request_form_no)
    {
        $showspecificreservation = ReserveCustomer::where('request_form_no', $request_form_no)->get();
        $reqfaci = unserialize($showspecificreservation[0]->request_use_facilities);
        return view('layouts.admin.manage-reservation.view-more', compact('showspecificreservation', 'reqfaci'));

    }


    public function edit($request_form_no)
    {
      $showspecificreservation = ReserveCustomer::where('request_form_no', $request_form_no)->get();
      $reqfaci = unserialize($showspecificreservation[0]->request_use_facilities);
      return view('layouts.admin.manage-reservation.edit-reservation', compact('showspecificreservation', 'reqfaci'));
  //  dd($showspecificreservation);
    }

    public function update(Request $request, ReserveCustomer $reserveCustomer, $request_form_no)
    {

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
        ]);

        return $this->index();

    }

    // public function destroy(ReserveCustomer $reserveCustomer)
    // {
    //     //
    // }
}
