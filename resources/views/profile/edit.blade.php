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
      <textarea class="form-control" name="name" id="name" rows="1" cols="30">{{$user->name}}</textarea>
    </label>
    <br>
    <label for="email">
      <strong>Edit email:</strong>
      <textarea class="form-control" name="email" id="email" rows="1" cols="30">{{$user->email}}</textarea>
    </label>
    <br>
    <label for="location">
      <strong>Edit location:</strong>
      <textarea class="form-control" name="location" id="location" rows="1" cols="30">{{$user->location}}</textarea>
    </label>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-warning" value="Update Profile">
  </div>
</form>
@endsection
