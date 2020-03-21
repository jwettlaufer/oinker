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
<h2>{{$user->name}}</h2>
<p>
<ul>
  <li>
    Email: {{$user->email}}
  </li>
  <li>
    Location:  {{$user->location}}
  </li>
</ul>
<a href="{{route('profile.edit', $user->id)}}">
    Edit Profile
</a>
</p>
@endsection
