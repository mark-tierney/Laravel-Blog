<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <title>Laravel App - @yield('title')</title>
    <style>
        .gradient-full{
            background: rgb(241,28,109);
            background: linear-gradient(90deg, rgba(241,28,109,1) 0%, rgba(255,129,64,1) 41%, rgba(121,0,255,1) 100%);
        }
        .gradient{
            background: rgb(241,28,109);
            background: linear-gradient(90deg, rgba(241,28,109,1) 0%, rgba(255,129,64,1) 100%, rgba(121,0,255,1) 100%);
        }
    </style>
    <script>
        function logout(){
            event.preventDefault(); 
            document.getElementById('logout-form').submit();
        }
    
    </script>
    
</head>
<body>
    <div class="flex-column flex-md-row align-items-center p-3 px-md-4 border-bottom shadow-sm mb-3 text-white gradient-full">
        <div class="row justify-content-center">
            <div class="col d-flex">
                <h5 class="my-0 mr-md-auto font-weight-normal">Laravel CRUD</h5>
                <nav class="my-2 my-md-0">
                    <a href="{{ route('home.index') }}" class="p-2 text-white">Home</a>
                    <a href="{{ route('home.contact') }}" class="p-2 text-white">Contact</a>
                    <a href="{{ route('posts.index') }}" class="p-2 text-white">Blog Posts</a>
                    @guest
                        <a href="{{ route('register') }}" class="p-2 text-white">Register</a>
                        <a href="{{ route('login') }}" class="p-2 text-white">Login</a>
                    @else
                        <a href="{{ route('posts.create') }}" class="p-2 text-white"><i class="bi bi-plus" ></i> Add Post</a>
                        <a href="{{ route('logout') }}" onclick="logout();" class="p-2 text-white">Logout ({{ Auth::user()->name }})</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" stlye="display:none;">@csrf</form>
                    @endguest
                </nav>
            </div>
        </div>
    </div>
    <div class="row m-3">
        <div class="col-lg-3">
            @yield('sidebar_left')
        </div>
        <div class="col-lg-6">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @yield('content') 
            <p class="text-muted mt-3">markltierney.com - Laravel CRUD</p>
        </div>
        <div class="col-lg-3">
            @yield('sidebar_right')
        </div>
        
    </div>
    
</body>
</html>