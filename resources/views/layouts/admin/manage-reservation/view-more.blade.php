@extends('layouts.app')

@section('content')

  <h2>View More</h2>
  <br />

  @foreach($showspecificreservation as $fetchspecific)
  @include('layouts.admin.manage-reservation.form')
  @endforeach

@endsection
