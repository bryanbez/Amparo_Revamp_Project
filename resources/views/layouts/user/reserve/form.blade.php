
        <div class="pb-4">
        <label>Request Date</label>
        <input type="text" name="datereq" value="{{ old('datereq') }}" id="datepicker" class="form-control">
        {{ $errors->first('datereq') }}
        <div>
        <br />

        <div class="pb-4">
        <label>Request Time</label>
            <select class="form-control" value="{{ old('timereq') }}" name="timereq" id="">

            </select>
            {{ $errors->first('timreq') }}
        <div>
        <br />

        <div class="pb-4">
        <label>Request Use Facilities</label>
                <br />
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="reqfaci[]" value="0" id="">
                  <label class="form-check-label">Private Room</label>
                </div>
                <br />
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="reqfaci[]" value="1" id="">
                  <label class="form-check-label">Function Room</label>
                </div>
                <br />
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="reqfaci[]" value="2" id="">
                  <label class="form-check-label">Poolside</label>
                </div>
                </br >
                {{ $errors->first('reqfaci') }}
        </div>

        <div class="pb-4">
        <label>Name / Group Name</label>
        <input type="text" name="groupname" value="{{ old('groupname') }}" id="" class="form-control">
        {{ $errors->first('groupname') }}
        <div>
        <br />

        <div class="pb-4">
        <label>Contact</label>
        <input type="text" name="groupcontact" value="{{ old('groupcontact') }}" id="" class="form-control">
        {{ $errors->first('groupcontact') }}
        <div>
        <br />

        <div class="pb-4">
        <label>Email</label>
        <input type="email" name="groupemail" value="{{ old('groupemail') }}" id="" class="form-control">
        {{ $errors->first('groupemail') }}
        <div>
        <br />

        <div class="pb-4">
        <label>People Count</label>
        <input type="text" name="peoplecount" value="{{ old('peoplecount') }}" id="" class="form-control">
        {{ $errors->first('peoplecount') }}
        <div>
        <br />

        <div class="pb-4">
        <label>Reserve Purpose</label>
        <textarea type="text" name="reservepurpose" value="{{ old('reservepurpose') }}" id="" class="form-control" rows="10" col="30"></textarea>
        {{ $errors->first('reservepurpose') }}
        <div>
        <br />

  @section('calendar-script')
  <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        var dateToday = new Date();
        var wholeDayEvent = {!! json_encode($toDataArray)  !!};
        console.log(wholeDayEvent);

        var dates = $("#datepicker").datepicker({
          dateFormat: 'yy-mm-dd',
          minDate: dateToday,
          beforeShowDay: function(date){
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [wholeDayEvent.indexOf(string)  == -1];
          },
          onSelect: function(date) {
            console.log(date);
            $.ajax({
              type: 'GET',
              url: 'checktimeavailable/'+date,
              success: function(message) {
                console.log(message);
                if(message == 'PM') {
                    $('[name=timereq]').empty();
                    $('[name=timereq]').append('<option value="0">AM (6:00 AM - 12:00 NN)</option>');
                }
                else if (message == 'AM') {
                    $('[name=timereq]').empty();
                    $('[name=timereq]').append('<option value="1">PM (1:00 PM - 7:00 PM)</option>');
                } else {
                    $('[name=timereq]').empty();
                    $('[name=timereq]').append('<option value="0">AM (6:00 AM - 12:00 NN)</option> <option value="1">PM (1:00 PM - 7:00 PM)</option> <option value="2">Whole Day (8:00 AM - 6:00 PM)</option>');

                }

              }
            });
          }
        });


    });
    </script>
  @stop
