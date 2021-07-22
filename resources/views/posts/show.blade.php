@extends('layouts.app')

@section('title', $post->title)

@section('content')

<div class="card">
    <div class="card-header" >
        <h3 style="margin:0">{{ $post->title }}
            @if (now()->diffInMinutes($post->created_at) < 5)
            <span class="badge badge-info" style="float:right">New</span>
            @endif
        </h3>
    </div>
    <p class="card-body" style="margin:0">{{ $post->content }}</p>
    <p class="card-footer text-muted" style="margin:0">Added {{ $post->created_at->diffForHumans() }}</p>
</div>

@endsection