@extends('layout')

@section('title')
Profile
@endsection

@section('content')
@include('partials.errors')
<div class="card">
  <div class="card-header">
    <img src="/oinker/public/img/piggy.png" style="height: 50px; width: 50px; border-radius: 50%;" class="img-responsive">
    <h2>{{$user->name}}</h2>
  </div>
  <div class="card-body">
    <p class="card-text">
    <ul>
      <li>
          Email: {{$user->email}}
      </li>
      <li>
          Location:  {{$user->location}}
      </li>
    </ul>
</p>
<p class="mb-2">
    <small>Following: <span class="badge badge-primary">{{ $user->followings()->get()->count() }}</span></small>
    <small>Followers: <span class="badge badge-primary tl-follower">{{ $user->followers()->get()->count() }}</span></small>
</p>
<button class="btn btn-info btn-sm action-follow" data-id="{{ $user->id }}"><strong>
@if(auth()->user()->isFollowing($user))
    UnFollow
@else
    Follow
@endif
</strong></button>
  </div>
</div>
@endsection
