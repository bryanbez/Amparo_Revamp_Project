@component('mail::message')

<div class="row">
  <h2> Here is the reservation details</h2>
    <div class="col-lg-12">
      <div class="card">
        <div class="card mb-3">
          <div class="card-header">
              <h2>Request No: {{ $data['reqformno'] }}</h2>
              <hr />
          </div>
          <div class="card-body">
              <p> Request Date of Reservation: {{ $data['datereq'] }} </p>
              <hr />
              <p> Request Time of Reservation:
                @if ($data['datereq'] == 0)
                AM (6:00 AM - 12:00 PM)
                @elseif ($data['datereq'] == 1)
                PM (1:00 PM - 7:00 PM)
                @else
                Whole Day (8:00 AM - 6:00 PM)
                @endif
              </p>
              <hr />
              <p> Request Use Facilities:
                {{ implode(", ", $requse) }}
              </p>
              <hr />
              <p> Requested Group/Person Name:
                {{ $data['groupname'] }}
              </p>
              <hr />
              <p> Requested Group/Person Contact:
                {{ $data['groupcontact'] }}
              </p>
              <hr />
              <p> Requested Group/Person Email:
                {{ $data['groupemail'] }}
              </p>
              <hr />
              <p> People Count:
                {{ $data['peoplecount'] }}
              </p>
              <hr />
              <p> Reserve Purpose:
                {{ $data['reservepurpose'] }}
              </p>
              <hr />
          </div>
          <div class="card-footer">
            <h3>  Reservation Status: Approved </h3>
              <br />
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <h2> Please remember your schedule. Thanks </h2>
    </div>
</div>




<!-- @component('mail::button', ['url' => '']) -->
@endcomponent
