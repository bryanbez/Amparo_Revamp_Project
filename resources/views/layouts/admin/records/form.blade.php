
<div class="pb-4">
<label>Request Date</label>
<input type="date" name="datereq" readonly value="{{ old('datereq') ?? $fetchspecific->date_request_occupy  }}" id="" class="form-control">
{{ $errors->first('datereq') }}
<div>
<br />

<div class="pb-4">
<label>Request Time</label>
    <select class="form-control" readonly value="{{ old('timereq') ?? $fetchspecific->time_request_occupy }}" name="timereq" id="">
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
<input type="text" name="groupname" readonly value="{{ old('groupname') ?? $fetchspecific->requested_group }}" id="" class="form-control">
{{ $errors->first('groupname') }}
<div>
<br />

<div class="pb-4">
<label>Contact</label>
<input type="text" name="groupcontact" readonly value="{{ old('groupcontact') ?? $fetchspecific->requested_group_contact }}" id="" class="form-control">
{{ $errors->first('groupcontact') }}
<div>
<br />

<div class="pb-4">
<label>Email</label>
<input type="email" name="groupemail" readonly value="{{ old('groupemail') ?? $fetchspecific->requested_group_email }}" id="" class="form-control">
{{ $errors->first('groupemail') }}
<div>
<br />

<div class="pb-4">
<label>People Count</label>
<input type="text" name="peoplecount" readonly value="{{ old('peoplecount') ?? $fetchspecific->people_count }}" id="" class="form-control">
{{ $errors->first('peoplecount') }}
<div>
<br />

<div class="pb-4">
<label>Reserve Purpose</label>
<textarea type="text" name="reservepurpose" readonly value="{{ old('reservepurpose') }}" id="" class="form-control" rows="10" col="30">{{ $fetchspecific->reserve_purpose }}</textarea>
{{ $errors->first('reservepurpose') }}
<div>
<br />

<div class="pb-4">
<label>Request Status</label>
    <select class="form-control" readonly name="reqstatus" id="">
        <option {{ $fetchspecific->reserve_status == 'Pending' ? 'selected' : ''}}>Pending</option>
        <option {{ $fetchspecific->reserve_status == 'Rejected' ? 'selected' : ''}}>Rejected</option>
        <option {{ $fetchspecific->reserve_status == 'Approved' ? 'selected' : ''}}>Approved</option>
    </select>

<div>
