<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Import the CSS file -->
    @vite('resources/css/app.css')
    <title>{{ config('app.name', 'ScoreBoard') }}</title>
</head>

<body>
    <!-- Page Content -->
    <main class="bg-gray-100">
        {{ $slot }}
    </main>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>
