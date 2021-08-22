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

@section('sidebar_left')
    <div class="mb-3">
        <div class="card border border-primary">
            <div class="card-body pb-3">
                <h5 class="card-title">Demo Blog App</h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    Built with Laravel 8.
                </h6>
                <p>This is a simple app implementing a CRUD in Laravel PHP for managing content on a MySQL database, developed by Mark L Tierney for demonstration purposed.</p>
                <a href="https://github.com/mark-tierney/Laravel-Blog" target="_blank" class="btn btn-success"><i class="bi bi-github" ></i> Github</a>
            </div>  
        </div>
    </div>
    

    <div class="mb-3">
        <x-card title="Key Features" subtitle="This app implements many useful aspects of Laravel.">
            <x-slot name="items">
                <li class="list-group-item">
                    User Authentication
                </li>
                <li class="list-group-item">
                    Post controller with CRUD operations
                </li>
                <li class="list-group-item">
                    Conditional rendering in blades
                </li>
                <li class="list-group-item">
                    Blade components
                </li>
                <li class="list-group-item">
                    Admin user priveledges
                </li>
            </x-slot>
        </x-card>
    </div>
@endsection

@section('sidebar_right')
    <div class="mb-3">
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
    <div class="mb-3">       
        <x-card 
            title="Most Active User" 
            subtitle="Users with the most posts" 
            :items="collect($mostActive)->pluck('name')">
        </x-card>                   
    </div>
    <div class="mb-3">
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
@endsection