@extends('layouts.app')

@section('content')
<div class="container">
	<h1>{{ $user->username }}</h1>
	Member since: {{ $user->created_at->diffForHumans() }}

	@can('create', $user)
	<h3>New post</h3>
	<form action="/create" method="post" class="mb-3">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" name="title" id="title" placeholder="Enter title" required />
		</div>
		<div class="form-group">
			<label for="message">Message</label>
			<input type="text" class="form-control" name="message" id="message" placeholder="Enter message" required />
		</div>
		{{ csrf_field() }}
		<button type="submit" class="btn-sm btn-primary">Submit</button>
	</form>
	@endcan

	<h3>Posts</h3>
	@foreach($posts as $post)
	<div class="card p-3 mb-3">
		<h5 class="card-title">{{ $post->title }}</h5>
		<h6 class="card-subtitle mb-2 text-muted">
			<a href="/{{$user->id}}">
				{{ $user->username }}
			</a> - {{ $post->created_at->diffForHumans() }}
		</h6>
		<p class="card-text">{{ $post->message }}</p>
		<a href="/post/{{$post->id}}" class="card-link">Link</a>
	</div>
	@endforeach
</div>
@endsection
