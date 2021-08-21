@extends('layouts.app')

@section('title', $post->title)

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between" >
        <h3 class="mb-0">
            <x-badge type="success" :show="now()->diffInMinutes($post->created_at) < 5">new</x-badge>
            {{ $post->title }}
        </h3>
        <x-updated :date="$post->created_at" :name="$post->user->name"></x-updated>
        {{--  <x-updated :date="$post->updated_at">updated</x-updated>  --}}
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
        <x-updated :date="$post->created_at"></x-updated>
        @empty
        <p class="text-muted mb-0">No comments yet.</p>
        @endforelse
    </div>
</div>

@endsection