@extends('layouts.app')

@section('content')

<div class="row">

  <div class="col-sm-12 col-md-12 col-lg-12">
      <h2>Today is {{ $dateToday }}</h2>
      <hr />
  </div>

  <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="card text-white bg-primary">
      <div class="card-header">
        Total Reservations Today
      </div>
      <div class="card-body">
        <h1 class="card-text">{{ $getTodayReservation }}</h1>
      </div>
    </div>
    <hr />
  </div>

  <div class="col-sm-12 col-md-12 col-lg-12">
    <h2>Events Today</h2>
    <br />

    @foreach($getTodayEventOnGoing as $fetchOnGoingEvent)
    <div class="card text-white bg-success">
      <div class="card-header">
        <strong> {{ $fetchOnGoingEvent->date_request_occupy }} || {{ $fetchOnGoingEvent->time_request_occupy }} Event </strong>
      </div>
      <div class="card-body">
        <h1 class="card-text">{{ $fetchOnGoingEvent->reserve_purpose }}</h1>
      </div>
      <div class="card-footer">
        Requested: {{ $fetchOnGoingEvent->requested_group }}
      </div>
    </div>
    <hr />
    @endforeach
  </div>

  <div class="col-sm-12 col-md-12 col-lg-12">
      <h2>Upcoming Events</h2>
      <br />
          @foreach($getUpcomingEvent as $fetchevents)
          <div class="card text-white bg-info">
            <div class="card-header">
              <strong> {{ $fetchevents->date_request_occupy }} || {{ $fetchevents->time_request_occupy }} Event </strong>
            </div>
            <div class="card-body">
              <h1 class="card-text">{{ $fetchevents->reserve_purpose }}</h1>
            </div>
            <div class="card-footer">
              Requested: {{ $fetchevents->requested_group }}
            </div>
          </div>
          <hr />
          @endforeach
  </div>


</div>



@endsection
