


        <div class="pb-4">
        <label>Request Form No</label>
        <input type="text" name="reqid" value="{{ $fetchspecific->request_form_no }}" readonly id="" class="form-control">
        <div>
        <br />

        <div class="pb-4">
        <label>Request Date</label>
        <input type="date" name="datereq" value="{{ old('datereq') ?? $fetchspecific->date_request_occupy  }}" id="" class="form-control">
        {{ $errors->first('datereq') }}
        <div>
        <br />

        <div class="pb-4">
        <label>Request Time</label>
            <select class="form-control" value="{{ old('timereq') ?? $fetchspecific->time_request_occupy }}" name="timereq" id="">
                <option value="0" {{ $fetchspecific->time_request_occupy == 0 ? 'selected' : ''}}>AM (6:00 AM - 12:00 NN)</option>
                <option value="1" {{ $fetchspecific->time_request_occupy == 1 ? 'selected' : ''}}>PM (1:00 PM - 7:00 PM)</option>
                <option value="2" {{ $fetchspecific->time_request_occupy == 2 ? 'selected' : ''}}>Whole Day (8:00 AM - 6:00 PM)</option>
            </select>
            {{ $errors->first('timreq') }}
        <div>
        <br />

        <div class="pb-4">
        <label>Request Use Facilities</label>

                <br />
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="reqfaci[]" value="0" id=""
                  {{ in_array(0, $reqfaci) ? "checked" : ""}} >
                  <label class="form-check-label">Private Room</label>
                </div>
                <br />
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="reqfaci[]" value="1" id=""
                  {{ in_array(1, $reqfaci) ? "checked" : ""}} >
                  <label class="form-check-label">Function Room</label>
                </div>
                <br />
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="reqfaci[]" value="2" id=""
                  {{ in_array(2, $reqfaci) ? "checked" : ""}} >
                  <label class="form-check-label">Poolside</label>
                </div>
                </br >
                {{ $errors->first('reqfaci') }}

        </div>

        <div class="pb-4">
        <label>Name / Group Name</label>
        <input type="text" name="groupname" value="{{ old('groupname') ?? $fetchspecific->requested_group }}" id="" class="form-control">
        {{ $errors->first('groupname') }}
        <div>
        <br />

        <div class="pb-4">
        <label>Contact</label>
        <input type="text" name="groupcontact" value="{{ old('groupcontact') ?? $fetchspecific->requested_group_contact }}" id="" class="form-control">
        {{ $errors->first('groupcontact') }}
        <div>
        <br />

        <div class="pb-4">
        <label>Email</label>
        <input type="email" name="groupemail" value="{{ old('groupemail') ?? $fetchspecific->requested_group_email }}" id="" class="form-control">
        {{ $errors->first('groupemail') }}
        <div>
        <br />

        <div class="pb-4">
        <label>People Count</label>
        <input type="text" name="peoplecount" value="{{ old('peoplecount') ?? $fetchspecific->people_count }}" id="" class="form-control">
        {{ $errors->first('peoplecount') }}
        <div>
        <br />

        <div class="pb-4">
        <label>Reserve Purpose</label>
        <textarea type="text" name="reservepurpose" value="{{ old('reservepurpose') }}" id="" class="form-control" rows="10" col="30">{{ $fetchspecific->reserve_purpose }}</textarea>
        {{ $errors->first('reservepurpose') }}
        <div>
        <br />

        <div class="pb-4">
        <label>Request Status</label>
        <p>{{ $fetchspecific->reserve_status}}</p>
            <select class="form-control" value="{{ old('reqstatus') ?? $fetchspecific->reserve_status }}" name="reqstatus" id="">
                <option value="0" {{ $fetchspecific->reserve_status == 0 ? 'selected' : ''}}>Approved</option>
                <option value="1" {{ $fetchspecific->reserve_status == 1 ? 'selected' : ''}}>Cancelled</option>
            </select>
        <div>
