@extends('layouts.app')

@section('content')

    <h2>Contact Us</h2>

    <br />
  
    <form action="" method="post">

    <div class="col-12 mb-4">
        <label for="">Your Name</label>
        <input class="form-control" type="text" name="name" id="">
    </div>

    <div class="col-12 mb-4">
        <label for="">Your Message</label>
        <textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="col-12 mb-4">
        <label for="">Your Email</label>
        <input class="form-control" type="email" name="email" id="">
    </div>

    <div class="col-12 mb-4">
        <button type="submit" class="form-control bg-success" name="submitmessage">Submit</button>
    </div>

@csrf
</form>

@endsection