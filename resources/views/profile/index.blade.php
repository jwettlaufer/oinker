@extends('layout')

@section('title')
Profile
@endsection

@section('content')
@if(session()->get('success'))
<div role="alert">
  {{session()->get('success')}}
</div>
@endif
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
    <a href="{{route('profile.edit', $user->id)}}" class="btn btn-warning">
      Edit Profile
    </a>
  </p>
</div>
</div>
@endsection
