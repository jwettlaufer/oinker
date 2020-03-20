@extends ('layout')

@section('title')
Edit Profile
@endsection
@section('content')
@include('partials.errors')
<form method="post" action="{{route('profile.update', $user->id)}}">
  @csrf
  @method('PATCH')
  <label for="name">
    <strong>Edit name:</strong>
    <textarea name="name" id="name" rows="10" cols="30">{{$user->name}}</textarea>
  </label>
  <input type="submit" value="Update Profile">
</form>
@endsection
