<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title','Blog')
    </title>
    <link rel="stylesheet" href="{{asset('css\app.css')}}">
</head>

<body>
    <ul class="nav">
        <li><a class="{{ request()->routeIs('home')?'active':''}}" href="{{route('home')}}">Home</a></li>
        <li><a class="{{ request()->routeIs('about')?'active':''}}" href="{{route('about')}}">About</a></li>
        <li><a class="{{ request()->routeIs('posts.create')?'active':''}}" href="{{route('posts.create')}}">Create posts</a></li>
    </ul>

    <!-- only include _errors subview if there is errors-->
    @includeWhen($errors->any(),'_errors')

    @if(session('success'))
    <div class="flash-success">
        {{session('success')}}
    </div>
    @endif




    <div class="main">
        @yield('content')
    </div>
</body>

</html>