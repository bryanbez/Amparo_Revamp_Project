@extends('layouts.app')

@section('content')

<h2> Reports </h2>
    <br />

<div class="row">

  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          Total Reservations
        </div>
        <div class="card-body">
          <h1 class="card-text">0000</h1>
        </div>
      </div>
    </div>
</div>

<hr />

<div class="row">

    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
      <div class="card">
        <div class="card-header">
          Total Reservations in this Day
        </div>
        <div class="card-body">
          <h1 class="card-text">0000</h1>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
      <div class="card">
        <div class="card-header">
          Total Reservations in this Month
        </div>
        <div class="card-body">
          <h1 class="card-text">0000</h1>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
      <div class="card">
        <div class="card-header">
          Total Reservations in this Year
        </div>
        <div class="card-body">
          <h1 class="card-text">0000</h1>
        </div>
      </div>
    </div>


</div>

<hr />

<div class="row">

  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
      <div class="card">
        <div class="card-header">
          Done Events
        </div>
        <div class="card-body">
          <h1 class="card-text">0000</h1>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card">
          <div class="card-header">
            Cancelled Events
          </div>
          <div class="card-body">
            <h1 class="card-text">0000</h1>
          </div>
        </div>
      </div>
</div>

<hr />


<div class="row">

  <div class="col-xl-12">

    <button class="btn btn-primary" type="button" name="button">Print All Reports</button>


  </div>

</div>

@endsection