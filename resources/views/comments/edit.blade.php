@extends ('layout')

@section('title')
Edit Comment
@endsection
@section('content')
<p>Edit Comment:</p>
@include('partials.errors')
<form method="post" action="{{route('comment.update', $comment->id)}}">
  @csrf
  @method('PATCH')
  <label for="body">
    <strong>Edit Comment:</strong>
    <textarea name="body" id="body" rows="10" cols="30">{{$comment->body}}</textarea>
  </label>
  <input type="submit" value="Update Comment">
</form>
@endsection
