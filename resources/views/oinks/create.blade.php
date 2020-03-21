@extends('layout')

@section('title')
Create Oink
@endsection
@section('content')
@include('partials.errors')

<form method="post" action="{{route('oinks.store')}}">
  @csrf
  <div class="form-group">
    <label for="message">
      <strong>Create a post:</strong>
      <textarea class="form-control" name="message" id="message" rows="5" cols="30"></textarea>
    </label>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-warning" value="Post Oink">
  </div>
</form>
@endsection
