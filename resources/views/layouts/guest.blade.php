<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Import the CSS file -->
    @vite('resources/css/app.css')
    <title>Score Board</title>

    <!-- Import Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="flex flex-col min-h-screen">
    <!-- Background Image -->
    <!-- Background Image -->
    <div class="relative z-0 min-h-screen flex flex-col items-center justify-center bg-cover bg-center"
        style="background-image: url('{{ asset('storage/images/user-background.jpg') }}');">
        <x-navbar-user />
        <main class="flex-grow flex items-center justify-center">
            {{ $slot }}
        </main>
        <!-- Footer -->
        <x-footer-user />
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>
