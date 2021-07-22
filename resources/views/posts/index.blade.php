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