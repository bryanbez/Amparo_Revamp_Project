@extends('layouts.app')

@section('content')

<h2> Calendar </h2>
    <br />

          {!! $calendar->calendar() !!}

@endsection

@section('scripts')
<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
{!! $calendar->script() !!}

@stop
