@extends('layouts.app')

@section('content')

<h2>Manage Reservation</h2>
<table class="table">
    <thead>
        <tr>
            <th>Date Request Occupy</th>
            <th>Requested Group</th>
            <th>Reserve Status</th>
            <th colspan="2">Options</th>
        </tr>
    </thead>
    <tbody>
  
    @foreach($allreservation as $reservation)
        <tr>
            <td>{{ $reservation->date_request_occupy }}</td>
            <td>{{ $reservation->requested_group }}</td>
            <td>{{ $reservation->reserve_status }}</td>
            <td><a class="btn btn-primary" href='/reservation/{{$reservation->request_form_no}}'>View More</a></td>
            <td><a class="btn btn-warning" href='/reservation/{{$reservation->request_form_no}}/edit'>Edit</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
