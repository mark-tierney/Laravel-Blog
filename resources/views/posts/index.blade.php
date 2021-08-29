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
    @include('posts.partials.info')
@endsection

@section('sidebar_right')
    @include('posts.partials.activity')
@endsection