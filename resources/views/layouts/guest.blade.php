<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ScoreBoard') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Roboto --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- Cinzel --}}
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- Archivo Black --}}
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">

    {{-- Geom --}}
    <link href="https://fonts.googleapis.com/css2?family=Geom:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- Sekuya --}}
    <link href="https://fonts.googleapis.com/css2?family=Sekuya&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased flex flex-col h-screen w-screen overflow-hidden"
    style="background-image: url('{{ asset('images/background/background-3.png') }}'); background-size: cover; background-attachment: fixed;">
    {{ $slot }}
</body>

</html>
