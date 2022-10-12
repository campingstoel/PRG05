<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
    <meta http-equiv="X-Frame-Options" content="deny">

    <link rel="icon" type="image/x-icon" href="https://cdn.freebiesupply.com/logos/large/2x/recycling-2-logo-black-and-white.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DumpIt') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
</head>
<body>
<main class="py-4">
            @yield('content')
        </main>
<footer></footer>
</body>