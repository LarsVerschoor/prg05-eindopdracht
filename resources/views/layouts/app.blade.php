    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name', 'GT7-Gallery')}}</title>
    @stack('head')
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/main.css') }}">
</head>
<body>
<div id="container">
    <aside>
        <nav>
            <a class="nav__row nav__row-title" href="{{route('posts.index')}}">
                <img src="{{ Vite::asset('resources/images/logo_dark_background.svg') }}" alt="GT-Gallery logo." class="nav__logo">
            </a>

            @if(Auth::user()->role === 1)
                <a class="nav__row" href="{{route('admin.index')}}" {{request()->routeIs('admin.index') ? 'data-current' : ''}}>
                    <img class="nav__icon" src="{{ Vite::asset('resources/images/icon_profile_white_'. ((request()->routeIs('admin.index')) ? 'bold' : 'default') .'.svg') }}" alt="home icon">
                    <div class="nav__title">Admin</div>
                </a>
            @endif

            <a class="nav__row" href="{{route('posts.index')}}" {{(request()->routeIs('posts.index') || request()->routeIs('posts.show')) ? 'data-current' : ''}}>
                <img class="nav__icon" src="{{ Vite::asset('resources/images/icon_home_white_'. ((request()->routeIs('posts.index') || request()->routeIs('posts.show')) ? 'bold' : 'default') .'.svg') }}" alt="home icon">
                <div class="nav__title">Home</div>
            </a>

            <a class="nav__row" href="{{route('posts.create')}}" {{request()->routeIs('posts.create') ? 'data-current' : ''}}>
                <img class="nav__icon" src="{{ Vite::asset('resources/images/icon_post_white_' . (request()->routeIs('posts.create') ? 'bold' : 'default') . '.svg') }}" alt="create post icon">
                <div class="nav__title">Create Post</div>
            </a>

            <a class="nav__row" href="{{route('posts.search')}}" {{request()->routeIs('posts.search') ? 'data-current' : ''}}>
                <img class="nav__icon" src="{{ Vite::asset('resources/images/icon_search_white_default.svg') }}" alt="search icon">
                <div class="nav__title">Search</div>
            </a>

            <a class="nav__row" href="">
                <img class="nav__icon" src="{{ Vite::asset('resources/images/icon_profile_white_default.svg') }}" alt="profile icon">
                <div class="nav__title">Profile</div>
            </a>

            <form class="nav__row" action="{{route('logout')}}" onclick="this.submit()" method="post">
                @csrf
                <img class="nav__icon" src="{{ Vite::asset('resources/images/icon_logout_white_default.svg') }}" alt="profile icon">
                <div type="submit" class="nav__title">Logout</div>
            </form>

        </nav>
    </aside>
    <main>
        @yield('content')
    </main>
</div>

</body>
</html>
