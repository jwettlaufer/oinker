@extends('layout')

@section('title')
Oinks Index
@endsection
@section('content')
@if(session()->get('success'))
<div role="alert">
  {{session()->get('success')}}
</div>
@endif
@include('partials.errors')
<p>List of Oinks:</p>
<ul>
  @foreach($oinks as $oink)
  <li>
    <h2>
      <a href="{{route('profile.show', $oink->user->id)}}">
        {{$oink->name}}
      </a>
    </h2>
      <p>
        {{$oink->message}}
      </p>
      <ul>
        <li>
            <a href="{{route('oinks.show', $oink->id)}}">
              Read More
            </a>
        </li>
        @auth
        <li>
            <a href="{{route('oinks.edit', $oink->id)}}">
              Edit Oink
            </a>
        </li>
        <li>
            <form action="{{route('oinks.destroy', $oink->id)}}" method="post">
              @csrf
                @method('DELETE')
                <input type="submit" value="Delete Oink">
            </form>
        </li>
        @endauth
      </ul>
  </li>
  @endforeach
</ul>
@endsection
