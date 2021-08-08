@extends('layouts.app')

@section('title', $post->title)

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between" >
        <h3 class="mb-0">
            @if (now()->diffInMinutes($post->created_at) < 5)
            <span class="badge badge-info">New</span>
            @endif
            {{ $post->title }}
        </h3>
        <span class="text-muted mb-0">added {{ $post->created_at->diffForHumans() }}</span>
    </div>
    <div class="card-body">
        <p class="mb-0">{{ $post->content }}</p>
    </div>
    <div class="card-footer">
        <h5>Comments</h5>
        @forelse ($post->comments as $comment)
        <p class="list-group mt-2">
            {{ $comment->content }}
        </p>
        <p class="text-muted mb-0">added {{ $comment->created_at->diffForHumans() }}</p>
        @empty
        <p class="text-muted mb-0">No comments yet.</p>
        @endforelse
    </div>
</div>

@endsection