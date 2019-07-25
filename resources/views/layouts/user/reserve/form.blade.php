
        <div class="pb-4">
        <label>Request Date</label>
        <input type="date" name="datereq" value="{{ old('datereq') }}" id="" class="form-control">
        {{ $errors->first('datereq') }}
        <div>
        <br />

        <div class="pb-4">
        <label>Request Time</label>
            <select class="form-control" value="{{ old('timereq') }}" name="timereq" id="">
                <option value="0">AM (6:00 AM - 12:00 NN)</option>
                <option value="1">PM (1:00 PM - 7:00 PM)</option>
                <option value="2">Whole Day (8:00 AM - 6:00 PM)</option>
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

        <!-- <div class="pb-4">
        <label>Request Status</label>
            <select class="form-control" value="{{ old('reqstatus') }}" name="reqstatus" id="">
                <option value="0">Pending</option>
                <option value="1">Not Approved</option>
                <option value="2">Approved</option>
            </select>
            {{ $errors->first('reqstatus') }}
        <div> -->
