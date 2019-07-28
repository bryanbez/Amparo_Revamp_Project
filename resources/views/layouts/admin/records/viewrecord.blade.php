@extends('layouts.app')

@section('content')

<h2> Details of Request Form No: {{ $showSpecificRecord[0]->request_form_no }} </h2>
    <br />

    @foreach($showSpecificRecord as $fetchspecific)
    @include('layouts.admin.records.form')
    @endforeach

@endsection
