@extends('layouts.app')

@section('content')

<br />
<h2> Records </h2>

<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
      <form action="/searchrecords" method="GET">
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

    {{ $fetchAllRecords->appends(request()->input())->links() }}

@endsection
