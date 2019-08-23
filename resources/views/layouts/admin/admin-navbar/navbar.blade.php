    <li class="{{ Request::is('evtcalendar') ? 'active' : ''}}">
       <a class="nav-link" href="/evtcalendar"><i class="fa fa-calendar"></i> Calendar</a>
    </li>
    <li class="{{ Request::is('reservation*') ? 'active' : ''}}">
        <a class="nav-link" href="/reservation"><i class="fas fa-list"></i> Manage Reservations</a>
    </li>
    <li class="{{ Request::is('record*') ? 'active' : ''}}">
        <a class="nav-link" href="/record"><i class="fa fa-file"></i> Records </a>
    </li>
    <li class="{{ Request::is('staff*') ? 'active' : ''}}">
        <a class="nav-link" href="/staff"><i class="fas fa-user"></i> Manage Staffs </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="/reports"> Reports </a>
    </li> -->
