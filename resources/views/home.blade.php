@extends('layouts.app')

@section('content')
<div class="container">

    @if(Auth::check() == 'true')
        @if(Auth::user()->name == 'admin')
            @include('layouts.admin.reports.view-report')
        @else
            @include('layouts.user.homepage.homepage')
        @endif
    @else

    @endif

</div>
@endsection
