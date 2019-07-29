@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @foreach($posts as $post)
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
    @endforeach
</div>
@endsection
