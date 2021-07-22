@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')
<div class="card">
    <div class="card-header">New Post</div>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        @include('posts.partials.form')
        <div class="p-3"><input type="submit" name="Create" class="btn btn-block text-white gradient"></div>
    </form>
</div>

@endsection