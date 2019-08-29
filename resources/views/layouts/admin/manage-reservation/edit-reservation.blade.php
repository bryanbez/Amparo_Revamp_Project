@extends('layouts.app')

@section('content')

<h2> Update Reservation </h2>
    <br />

    <form action="/reservation/{{ $showspecificreservation[0]->request_form_no }}" method="POST">
        @Method('PATCH')

        @include('layouts.admin.manage-reservation.form')

        <button type="submit" class="btn btn-primary mt-3" name="updatereservation">Update Reservation</button>
        <a href="{{ url()->previous() }}" class="btn btn-danger mt-3" name="return">Go Back</a>
        @csrf
    </form>

@endsection
