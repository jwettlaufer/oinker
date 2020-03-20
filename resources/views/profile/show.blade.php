@extends('layout')

@section('title')
View Profile
@endsection

@section('content')
@include('partials.errors')
<h2>{{$user->name}}</h2>
<p>
<ul>
  <li>
    Email:{{$user->email}}
  </li>
  <li>
    Location:{{$user->location}}
  </li>
</ul>
</p>
@endsection
