@extends('layouts.app')

@section('title', 'Update Post')

@section('content')
<div class="card">
    <div class="card-header">Edit Post</div>
    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('PUT')
        @include('posts.partials.form')
        <div class="p-3"><input type="submit" value="Update" class="btn btn-block text-white gradient"></div>
    </form>
</div>
@endsection