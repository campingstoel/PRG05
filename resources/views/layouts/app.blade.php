<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="https://cdn.freebiesupply.com/logos/large/2x/recycling-2-logo-black-and-white.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DumpIt') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'DumpIt.') }}
                </a>
                @if (Auth::user())
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <a class="nav-link " id="tab-register" data-mdb-toggle="pill" href="{{ url('/products') }}" role="tab" aria-controls="pills-register" aria-selected="false">{{ __('Products') }}</a>
@endif
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    @if (Auth::user() && Auth::user()->role == 'admin')
                    <a class="nav-link " id="tab-register" href="{{ url('/admin') }}">Admin</a>
                    @endif
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    <a class="text-center" href="{{ url('/home') }}">
                        Keeping the planet clean
                    </a>
                    <!-- Right Side Of Navbar -->
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">

                        <li class="nav-item" role="presentation">

                            <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="{{ route('login') }}" role="tab" aria-controls="pills-login" aria-selected="true">{{ __('Login') }}</a>
                        </li>

                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="{{ route('register') }}" role="tab" aria-controls="pills-register" aria-selected="false">{{ __('Register') }}</a>
                        </li>

                    </ul>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/profile') }}">{{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>