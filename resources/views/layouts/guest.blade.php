<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BMIS</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-search/dist/leaflet-search.min.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-search/dist/leaflet-search.min.js"></script>
    <!-- Styles -->
    @vite('resources/sass/app.scss')
</head>

<body style="position: relative; min-height: 100vh;">
    @php
        $minHeight = request()->routeIs('login') ? '100vh' : '140vh';
    @endphp

    <div
        style="background-image: url('{{ asset('images/background/kayanlog.jpg') }}'); background-size: 100% 100%; background-position: center; width: 100%; position: absolute; z-index: -1; 
        min-height: {{ $minHeight }};">
    </div>

    <main>
        <section class="mt-5 mt-lg-0 bg-soft d-flex align-items-center" style="position: relative; z-index: 1;">
            @yield('content')
        </section>
    </main>
</body>

</html>
