@extends('layouts.app')

@section('content')

<h2>Display All Reservation</h2>
<p> This displays the pending reservations only </p>

    <table class="table">
        <thead>
            <tr>
                <th>Request Form No</th>
                <th>Date to Reserve</th>
                <th>Time to Reserve</th>
                <th>Facilities Use</th>
                <th>Group Requested</th>
                <th>People Count</th>
                <th>Reserve Purpose</th>
                <th>Reserve Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allreservation as $reserve)
            <tr>
                <td scope="row">{{ $reserve->request_form_no }}</td>
                <td> {{ $reserve->date_request_occupy }} </td>
                <td> {{ $reserve->time_request_occupy }} </td>
                <td> {{ $reserve->request_use_facilities }} </td>
                <td> {{ $reserve->requested_group }} </td>
                <td> {{ $reserve->people_count }} </td>
                <td> {{ $reserve->reserve_purpose }} </td>
                <td> {{ $reserve->reserve_status }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
