@extends ('layout')

@section('title')
Edit Profile
@endsection
@section('content')
@include('partials.errors')
<form method="post" action="{{route('profile.update', $user->id)}}">
  @csrf
  @method('PATCH')
  <div class="form-group">
    <label for="name">
      <strong>Edit name:</strong>
      <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
    </label>
    <br>
    <label for="email">
      <strong>Edit email:</strong>
      <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
    </label>
    <br>
    <label for="location">
      <strong>Edit location:</strong>
      <input type="text" class="form-control" name="location" id="location" value="{{$user->location}}">
    </label>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-warning" value="Update Profile">
  </div>
</form>
@endsection
