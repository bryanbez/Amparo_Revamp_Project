@extends('layouts.app')

@section('content')

<h2>Request Reservation </h2>
    <br />

    <form action="/reservation" method="POST">
        @method("POST")
        @include('layouts.user.reserve.form')

        <button type="submit" class="btn btn-primary mt-3" name="submitreservation">Add Reservation</button>
        @csrf 
    </form>

@endsection