@extends('layouts.app')

@section('content')
<div class="container">

    @if(Auth::check() == 'true')
        @if(Auth::user()->name == 'admin')
            @include('layouts.admin.reports.view-report')
        @else

        @endif
    @else

    @endif

</div>
@endsection
