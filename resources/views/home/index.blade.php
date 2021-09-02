@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 style="margin:0">Laravel Blog</h1>
    </div>
    <div class="card-body">
        <p>This is a blog app implementing a CRUD with many useful features in Laravel PHP for managing content on a MySQL database, developed by Mark L Tierney for demonstration purposed.</p>
        <a href="https://github.com/mark-tierney/Laravel-Blog" target="_blank" class="btn btn-success"><i class="bi bi-github" ></i> Github</a>
    </div>
    <div class="card-footer">
        <h3>Key Features</h3>
        <ul class="list-group list-group-flush">
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
                Admin user priveledges
            </li>
            <li class="list-group-item">
                Tags and tag filtering
            </li>
            <li class="list-group-item">
                Comments form for users
            </li>
            <li class="list-group-item">
                Post ranking queries
            </li>
        </ul> 
    </div>  
</div>
@endsection
