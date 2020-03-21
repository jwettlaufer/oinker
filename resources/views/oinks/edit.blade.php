@extends ('layout')

@section('title')
Edit Oink
@endsection
@section('content')
@include('partials.errors')
<form method="post" action="{{route('oinks.update', $oink->id)}}">
  @csrf
  @method('PATCH')
<div class="form-group">
    <label for="message">
      <strong>Edit Post:</strong>
      <textarea class="form-control" name="message" id="message" rows="5" cols="30">{{$oink->message}}</textarea>
    </label>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-warning" value="Update Oink">
  </div>
</form>
@endsection
