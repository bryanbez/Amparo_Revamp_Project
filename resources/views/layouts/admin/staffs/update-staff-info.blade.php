@extends('layouts.app')

@section('content')

<h2> Details of Staff No: {{ $specificStaff[0]->id }} </h2>
    <br />

    @foreach($specificStaff as $fetchspecific)

    <form action="/staff/{{ $fetchspecific->id }}" method="POST">
    @Method('PATCH')

      @include('layouts.admin.staffs.form')
      @endforeach

      <button type="submit" class="btn btn-primary mt-3" name="updateStaffInfo">Update Info</button>
      <a href="/staff" class="btn btn-danger mt-3" name="return">Go Back</a>
      @csrf
  </form>

@endsection
