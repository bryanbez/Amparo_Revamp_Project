@extends('layouts.app')

@section('content')

<h2> Update Reservation </h2>
    <br />

    @foreach($showspecificreservation as $fetchspecific)

    <form action="/reservation/{{ $fetchspecific->request_form_no }}" method="POST">
        @Method('PATCH')

        @include('layouts.admin.manage-reservation.form')

        <button type="submit" class="btn btn-primary mt-3" name="updatereservation">Update Reservation</button>
        <button href="/reservation" class="btn btn-danger mt-3" name="return">Go Back</button>
        @csrf
    </form>

    @endforeach

@endsection
