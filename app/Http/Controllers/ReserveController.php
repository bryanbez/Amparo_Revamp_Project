<?php

namespace App\Http\Controllers;

use App\ReserveCustomer;
use Illuminate\Http\Request;

class ReserveController extends Controller
{

    public function index()
    {
        $this->authorize('view', ReserveCustomer::class);
        $allreservation = ReserveCustomer::all();

        return view('layouts.admin.manage-reservation.fetch-list', compact('allreservation'));
    }

    public function create()
    {
        return view('layouts.user.reserve.create');
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

        $saveReservation = new ReserveCustomer();
        $saveReservation->request_form_no = rand(4, 8);
        $saveReservation->date_request_occupy = $request->datereq;
        $saveReservation->time_request_occupy = $request->timereq;
        // $saveReservation->request_use_facilities = implode(",", $request->reqfaci);
        $saveReservation->request_use_facilities = serialize($request->reqfaci);
        $saveReservation->requested_group = $request->groupname;
        $saveReservation->requested_group_contact = $request->groupcontact;
        $saveReservation->requested_group_email = $request->groupemail;
        $saveReservation->people_count = $request->peoplecount;
        $saveReservation->reserve_purpose = $request->reservepurpose;
        $saveReservation->reserve_status = 0;

         $saveReservation->save();

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

       //dd($data, $request->datereq);
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
        return redirect('/reservation');

    }

    // public function destroy(ReserveCustomer $reserveCustomer)
    // {
    //     //
    // }
}
