@extends ('layout')

@section('title')
Edit Oink
@endsection
@section('content')
@include('partials.errors')

<div id="app">
<oink-edit-form v-model="message" edit-url="{{route('oinks.update', $oink->id)}}" original-message="{{$oink->message}}">
@csrf
@method('PATCH')
</oink-edit-form>
<Giphy v-on:image-clicked="imageClicked" />
</div>
@endsection
