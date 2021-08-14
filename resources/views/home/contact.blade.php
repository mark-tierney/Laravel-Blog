@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<h1>Contact</h1>
<div>
    <p>This app was created by Mark L Tierney as a demonstration of Laravel PHP full stack proficiency.</p>
</div>

@can('home.secret')
    <a href="{{ route('home.secret') }}">Go to special contact details.</a>
@endcan
@endsection