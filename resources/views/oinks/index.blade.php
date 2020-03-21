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
    <div class="card">
    <div class="card-header">
    <h2>
      <img src="/oinker/public/img/piggy.png" style="height: 50px; width: 50px; border-radius: 50%;" class="img-responsive">
      <a href="{{route('profile.show', $oink->user->id)}}">
        {{$oink->name}}
      </a>
    </h2>
    </div>
    <div class="card-body">
      <p class="card-text">
        {{$oink->message}}
      </p>
    </div>
      <ul>
        <li>
            <a href="{{route('oinks.show', $oink->id)}}" class="btn btn-primary">
              Read More
            </a>
        </li>
        @auth
        <li>
          @include('partials.likes')
        </li>
        <li>
            <a href="{{route('oinks.edit', $oink->id)}}" class="btn btn-primary">
              Edit Oink
            </a>
        </li>
        <li>
            <form action="{{route('oinks.destroy', $oink->id)}}" method="post">
              @csrf
                @method('DELETE')
                <input type="submit" value="Delete Oink" class="btn btn-warning">
            </form>
        </li>
        @endauth
      </ul>
    </div>
  </li>
  @endforeach
</ul>
@endsection
