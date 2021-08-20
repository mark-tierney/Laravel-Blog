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
        <div class="card border border-primary" style="width: 18rem;">
            <div class="card-body pb-2">
                <h5 class="card-title">Most Commented</h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    What people are currently talking about
                </h6>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($mostCommented as $post)
                    <li class="list-group-item">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="container mb-3">
    <div class="row">
        <div class="card border border-primary" style="width: 18rem;">
            <div class="card-body pb-2">
                <h5 class="card-title">Most Active User</h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    Users with the most posts
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($mostActive as $user)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $user->name }}</span>
                        <span>{{ $user->blog_posts_count.' posts' }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="container mb-3">
    <div class="row">
        <div class="card border border-primary" style="width: 18rem;">
            <div class="card-body pb-2">
                <h5 class="card-title">Most Active User Last Month</h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    Users with the most posts last month
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($mostActiveLastMonth as $user)
                <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $user->name }}</span>
                    <span>{{ $user->blog_posts_count.' posts' }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection