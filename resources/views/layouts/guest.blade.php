<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Import the CSS file -->
    @vite('resources/css/app.css')
    <title>Score Board</title>
</head>

<body class="flex flex-col min-h-screen">
    <x-navbar-user />
    <main class="flex-grow flex items-center justify-center">
        {{ $slot }} <!-- Konten Utama -->
    </main>
    <!-- Footer -->
    <x-footer-user />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>
