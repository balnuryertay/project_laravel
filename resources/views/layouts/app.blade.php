<!doctype html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/js/app.js'])

    <!-- Scripts -->
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #06D7FF;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                {{ config('app.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

                <ul class="navbar-nav me-auto">
                    @isset($categories)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('foods.index')}}">{{ __('messages.menu') }}</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('messages.category') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @foreach($categories as $cat)
                                    <a class="dropdown-item" href="{{route('foods.category', $cat->id)}}">{{ $cat->{'name_'.app()->getLocale()} }}</a>
                                @endforeach
                            </div>
                        </li>

                        @can('create', App\Models\Food::class)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('foods.create')}}">{{ __('messages.addfood') }}</a>
                            </li>
                        @endcan

                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('basket.index')}}">{{ __('messages.basket') }}</a>
                            </li>
                        @endauth

{{--                        @auth--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{route('foods.likes')}}">LIKE</a>--}}
{{--                            </li>--}}
{{--                        @endauth--}}

                        @can('viewOrder', App\Models\User::class)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('basket.courier')}}">{{ __('messages.orders') }}</a>
                            </li>
                        @endcan

                    @endisset
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login.form'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.form') }}">{{ __('messages.login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register.form'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register.form') }}">{{ __('messages.register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->role->name == "admin")
                                    <a class="dropdown-item" href="{{route('adm.users.index')}}">
                                        {{ __('messages.admin') }}
                                    </a>
                                @endif

                                @if (Auth::user()->role->name == "moderator")
                                    <a class="dropdown-item" href="{{route('adm.users.index')}}">
                                        {{ __('messages.moderator') }}
                                    </a>
                                @endif

                                <a class="dropdown-item" href="{{ route('users.balance', Auth::user()->id) }}">
                                    {{ __('messages.payment') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('messages.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    @endguest

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ config('app.languages')[app()->getLocale()] }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @foreach(config('app.languages') as $ln => $lang)
                                <a class="dropdown-item" href="{{route('switch.lang', $ln)}}">
                                    {{$lang}}
                                </a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col md-10 mx-auto">

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
