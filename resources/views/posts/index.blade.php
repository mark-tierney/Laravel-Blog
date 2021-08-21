@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
{{-- @each('posts.partials.post', $posts, 'post') --}}

@forelse ($posts as $key => $post)
<ul class="list-group">
    @include('posts.partials.post', [])
</ul>
@empty
No Posts Found
@endforelse
@endsection

@section('sidebar')
<div class="container mb-3">
    <div class="row">
        <x-card title="Most Commented" subtitle="What people are currently talking about">
            <x-slot name="items">
                @foreach ($mostCommented as $post)
                    <li class="list-group-item">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </x-slot>
        </x-card>
    </div>
</div>
<div class="container mb-3">
    <div class="row">
        <x-card 
            title="Most Active User" 
            subtitle="Users with the most posts" 
            :items="collect($mostActive)->pluck('name')">
        </x-card>
            
    </div>
</div>
<div class="container mb-3">
    <div class="row">
        <x-card title="Most Active User Last Month" subtitle="Users with the most posts last month">
            @slot('items')
                @foreach ($mostActiveLastMonth as $user)
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $user->name }}</span>
                    <span>{{ $user->blog_posts_count.' posts' }}</span>
                </li>
                @endforeach
            @endslot
        </x-card>
    </div>
</div>
@endsection