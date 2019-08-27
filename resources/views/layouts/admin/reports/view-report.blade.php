

<h1> Dashboard </h1>
    <br />

<div class="row">

  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
      <div class="card text-white bg-primary mb-3">
        <div class="card-header">
          Total Reservations
        </div>
        <div class="card-body">
          <h1 class="card-text">{{ $totalCount }}</h1>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card text-white bg-secondary mb-3">
          <div class="card-header">
            Upcoming Events
          </div>
          <div class="card-body">
            <h1 class="card-text">{{ $getTotalUpcoming }}</h1>
          </div>
        </div>
      </div>
</div>

<hr />

<div class="row">

    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
      <div class="card text-white bg-info mb-3">
        <div class="card-header">
          Total Reservations in this Day
        </div>
        <div class="card-body">
          <h1 class="card-text">{{ $getTodayReservation }}</h1>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
      <div class="card text-white bg-info mb-3">
        <div class="card-header">
          Total Reservations in this Month
        </div>
        <div class="card-body">
          <h1 class="card-text">{{ $getThisMonthReservation }}</h1>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
      <div class="card text-white bg-info mb-3">
        <div class="card-header">
          Total Reservations in this Year
        </div>
        <div class="card-body">
          <h1 class="card-text">{{ $getThisYearReservation }}</h1>
        </div>
      </div>
    </div>


</div>

<hr />

<div class="row">

  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
      <div class="card text-white bg-success mb-3">
        <div class="card-header">
          Done Events
        </div>
        <div class="card-body">
          <h1 class="card-text">{{ $getDoneEvents }}</h1>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card text-white bg-danger mb-3">
          <div class="card-header">
            Cancelled Events
          </div>
          <div class="card-body">
            <h1 class="card-text">{{ $getCancelledEvents }}</h1>
          </div>
        </div>
      </div>
</div>

<hr />

<div class="row">

  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
    <a href="/reportPDFUpcoming" class="btn btn-primary" type="button" name="button">Export Upcoming Events This Month</a>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
    <a href="/reportPDFDone" class="btn btn-primary" type="button" name="button">Export Done Events </a>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
    <a href="/reportPDFReserve" class="btn btn-primary" type="button" name="button">Export Reservation Lists</a>
  </div>

  <div class="col-sm-12 col-md-12 col-lg-12">
    <hr />
    <br />
    <h2>Recently Updated Reservations</h2>
      @foreach($getUpdatedRecordsinReservation as $fetchUpdatedRecordsinReservation)
        <div class="card text-white bg-info mb-3">
          <div class="card-header">
            {{ $fetchUpdatedRecordsinReservation->date_request_occupy }} || {{ $fetchUpdatedRecordsinReservation->time_request_occupy }}
          </div>
          <div class="card-body">
            <h1 class="card-text">{{ $fetchUpdatedRecordsinReservation->reserve_purpose }}</h1>
          </div>
          <div class="card-footer">
            Status: {{ $fetchUpdatedRecordsinReservation->reserve_status }}
          </div>
        </div>
      @endforeach
  </div>
</div>
