@extends ('layout')
@section('title')
Show Oink
@endsection
@section('content')
@include('partials.errors')

<h2><a href="{{route('profile.show', $oink->user->id)}}">{{$oinkUser->name}}</a></h2>
<p>
@if($oink->is_gif == TRUE)
  <img src="{{$oink->message}}">
@else
  {{$oink->message}}
@endif
</p>
<h4>Display Comments</h4>
@include('partials.comment_replies', ['comments' => $oink->comments, 'oink_id' => $oink->id])
<h4>Add comment</h4>
      <form method="post" action="{{ route('comment.add') }}">
        @csrf
        <div class="form-group">
          <input type="text" name="comment_body" class="form-control" />
          <input type="hidden" name="oink_id" value="{{ $oink->id }}" />
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-warning" value="Add Comment" />
        </div>
      </form>
@endsection
