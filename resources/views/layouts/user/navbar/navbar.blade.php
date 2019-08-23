
   <li class="{{ Request::is('actcalendar') ? 'active' : ''}}">
       <a class="nav-link" href="/actcalendar"><i class="fa fa-calendar"></i> Calendar</a>
    </li>
    <li class="{{ Request::is('reserve') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('reserve.create') }}"><i class="fa fa-plus"></i> Reserve</a>
    </li>
