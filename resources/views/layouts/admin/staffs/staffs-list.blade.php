@extends('layouts.app')

@section('content')

<h2>Manage Staffs</h2>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>E-Mail</th>
            <th colspan="2">Options</th>
        </tr>
    </thead>
    <tbody>

    @foreach($fetchStaff as $staffs)
        <tr>
            <td>{{ $staffs->name }}</td>
            <td>{{ $staffs->email }}</td>
            <td><a class="btn btn-warning" href='/staff/{{$staffs->id}}/edit'>Update</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
