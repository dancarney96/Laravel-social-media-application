@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card p-3 mb-3">
		<h5 class="card-title">{{ $post->title }}</h5>
		<h6 class="card-subtitle mb-2 text-muted">
			<a href="/{{$post->user_id}}">
				{{ App\User::find($post->user_id)->username }}
			</a> - {{ $post->created_at->diffForHumans() }}
		</h6>
		<p class="card-text">{{ $post->message }}</p>
		<a href="/post/{{$post->id}}" class="card-link">Link</a>
	</div>
</div>
@endsection
