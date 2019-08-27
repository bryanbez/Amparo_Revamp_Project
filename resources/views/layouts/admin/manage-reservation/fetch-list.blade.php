@extends('layouts.app')

@section('content')

<br />
<h2>Manage Reservation</h2>

<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
      <form action="/searchreservation" method="GET">
          <input class="form-control" type="text" name="searchText" placeholder="Search">
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <button type="submit" class="btn btn-primary">Search</button>
      </form>
      @csrf
    </div>
</div>

<br />

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
            <td><a class="btn btn-secondary" href='/reservation/{{$reservation->request_form_no}}/edit'>Edit</a></td>
        </tr>
    @endforeach
    </tbody>
</table>


{{ $allreservation->appends(request()->input())->links() }}


@endsection
