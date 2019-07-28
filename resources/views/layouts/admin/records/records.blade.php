@extends('layouts.app')

@section('content')

<h2> Records </h2>
    <br />

    <table class="table">
        <thead>
            <tr>
                <th>Date Request Occupy</th>
                <th>Requested Group</th>
                <th>Reserve Status</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fetchAllRecords as $getRecord)
                <td> {{ $getRecord->date_request_occupy }} </td>
                <td> {{ $getRecord->requested_group }} </td>
                <td> {{ $getRecord->reserve_status }} </td>
                <td> </td>
            @endforeach
        </tbody>
    </table>

@endsection
