@extends('layout')

@section('title')
Create Oink
@endsection
@section('content')
@include('partials.errors')

<div id="app">
<oink-create-form submission-url="{{route('oinks.store')}}">
@csrf
</oink-create-form>
<Giphy />
</div>
@endsection
