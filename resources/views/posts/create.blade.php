@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    @include('posts.partials.form')
    <div><input type="submit" name="Create" class="btn btn-block text-white gradient"></div>
</form>

@endsection