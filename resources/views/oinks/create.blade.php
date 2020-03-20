@extends('layout')

@section('title')
Create Oink
@endsection
@section('content')
<p>Create Oink:</p>
@include('partials.errors')
<form method="post" action="{{route('oinks.store')}}">
  @csrf
  <label for="message">
    <strong>Create a post:</strong>
    <textarea name="message" id="message" rows="10" cols="30"></textarea>
  </label>
  <input type="submit" value="Post Oink">
</form>
@endsection
