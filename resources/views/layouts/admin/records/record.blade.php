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

            @foreach($fetchAllRecords as $getRecord)
            <tbody>
                <td> {{ $getRecord->date_request_occupy }} </td>
                <td> {{ $getRecord->requested_group }} </td>
                <td> {{ $getRecord->reserve_status }} </td>
                <td><a class="btn btn-primary" href='/record/{{$getRecord->record_id}}'>View More</a></td></td>
            </tbody>
            @endforeach

    </table>

      {{ $fetchAllRecords->links() }}

@endsection
