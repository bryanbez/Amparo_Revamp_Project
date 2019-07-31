

<div class="pb-4">
<label>User Name</label>
<input type="text" name="txt_username" value="{{ old('txt_username') ?? $fetchspecific->name  }}" id="" class="form-control">
{{ $errors->first('txt_username') }}
<div>
<br />

<div class="pb-4">
<label>E-Mail</label>
<input type="text" name="txt_email" value="{{ old('txt_email') ?? $fetchspecific->email  }}" id="" class="form-control">
{{ $errors->first('txt_email') }}
<div>
<br />
