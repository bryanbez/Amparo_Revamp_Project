@extends('layouts.app')

@section('content')


<h2>View More</h2>
<br />

<div class="row">

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        @foreach($showspecificreservation as $fetchspecific)
        <div class="card mb-3">
          <div class="card-header">
              <h2>Request No: {{ $fetchspecific->request_form_no }}</h2>
          </div>
          <div class="card-body">
            <h5 class="card-text">
              Date Requested: {{ $fetchspecific->date_request_occupy }} <br /> <hr />
              Time Requested:
              @if($fetchspecific->time_request_occupy == 'AM')
                {{ $fetchspecific->time_request_occupy }} (6:00 AM - 12:00 NN)
              @elseif($fetchspecific->time_request_occupy == 'PM')
                {{ $fetchspecific->time_request_occupy }} (1:00 PM - 7:00 PM)
              @else
                {{ $fetchspecific->time_request_occupy }} (8:00 AM - 6:00 PM)
              @endif
              <br /> <hr />
              Requested By: {{ $fetchspecific->requested_group }} <br /> <hr />
              Requested Contact No: {{ $fetchspecific->requested_group_contact }} <br /> <hr />
              Requested Email: {{ $fetchspecific->requested_group_email }} <br /> <hr />
              Requested Facilities:
              <br /><br />
              <div class="form-check">
              <input class="form-check-input" type="checkbox" name="reqfaci[]" value="0" id=""
                {{ in_array(0, $reqfaci) ? "checked" : ""}} >
                <label class="form-check-label">Private Room</label>
              </div>
              <br />
              <div class="form-check">
              <input class="form-check-input" type="checkbox" name="reqfaci[]" value="1" id=""
                {{ in_array(1, $reqfaci) ? "checked" : ""}} >
                <label class="form-check-label">Function Room</label>
              </div>
              <br />
              <div class="form-check">
              <input class="form-check-input" type="checkbox" name="reqfaci[]" value="2" id=""
                {{ in_array(2, $reqfaci) ? "checked" : ""}} >
                <label class="form-check-label">Poolside</label>
              </div>
            </br ><hr />
              People Count: {{ $fetchspecific->people_count }} <br /> <hr />
              Request Purpose: {{ $fetchspecific->reserve_purpose }} <br />
            </h5>
          </div>
          <div class="card-footer">
            <h3>  Reservation Status:
              @if($fetchspecific->reserve_status == 'Approved')
              <b style="color: green;">{{ $fetchspecific->reserve_status }}</b>
              @else
              <b style="color: red;">{{ $fetchspecific->reserve_status }}</b>
              @endif
              <br /> </h3>
          </div>
        </div>
          @endforeach
    </div>

</div>
@endsection
