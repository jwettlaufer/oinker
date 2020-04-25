@extends('layout')

@section('title')
Create Oink
@endsection
@section('content')
@include('partials.errors')

<div id="app">
<oink-create-form v-model="message" submission-url="{{route('oinks.store')}}">
@csrf
</oink-create-form>
<Giphy v-on:image-clicked="imageClicked" />
</div>
@endsection
