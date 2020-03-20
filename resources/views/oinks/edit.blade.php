@extends ('layout')

@section('title')
Edit Oink
@endsection
@section('content')
<p>Edit Oink:</p>
@include('partials.errors')
<form method="post" action="{{route('oinks.update', $oink->id)}}">
  @csrf
  @method('PATCH')
  <label for="message">
    <strong>Edit Post:</strong>
    <textarea name="message" id="message" rows="10" cols="30">{{$oink->message}}</textarea>
  </label>
  <input type="submit" value="Update Oink">
</form>
@endsection
