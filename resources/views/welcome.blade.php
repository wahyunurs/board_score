@php
    if (Auth::check()) {
        if (Auth::user()->role === 'admin') {
            header('Location: ' . route('admin.dashboard'));
            exit();
        } elseif (Auth::user()->role === 'user') {
            header('Location: ' . route('user.dashboard'));
            exit();
        }
    }
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kompetisi Cerdas Cermat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen">
    <!-- Background Image -->
    <div class="relative z-0 min-h-screen flex flex-col items-center justify-center bg-cover bg-center"
        style="background-image: url('{{ asset('storage/images/user-background.jpg') }}');">

        <!-- Navbar -->
        <nav class="bg-gray-900 border-gray-200 dark:bg-gray-900 w-full">
            <div class="flex items-center justify-between mx-auto p-4 w-full">
                <div class="flex-1 flex justify-center gap-4">
                    <img class="w-8 h-8" src="{{ asset('storage/images/logo-udinus.png') }}" alt="Udinus">
                    <img class="w-8 h-8" src="{{ asset('storage/images/logo-unggul.png') }}" alt="Unggul">
                    <img class="w-8 h-8" src="{{ asset('storage/images/logo-dpm.png') }}" alt="DPMKM Udinus">
                    <img class="w-8 h-8" src="{{ asset('storage/images/logo-parlemen.png') }}" alt="Parlemen">
                    <img class="w-8 h-8" src="{{ asset('storage/images/logo-dinusfest.png') }}" alt="Dinus Fest">
                    <img class="w-8 h-8" src="{{ asset('storage/images/logo-gkc.png') }}" alt="GKC">
                </div>
                <div class="flex items-center space-x-3 justify-end">
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                            @auth
                                {{-- Bagian ini tidak akan dieksekusi karena user sudah langsung di-redirect --}}
                            @else
                                <a href="{{ route('login') }}"
                                    class="font-semibold text-white hover:text-gray-200 dark:text-white dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                    in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 font-semibold text-white hover:text-gray-200 dark:text-white dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        <main class="flex-grow flex items-center justify-center">
            <div class="flex flex-col items-center justify-center text-center">
                <h1 class="text-white text-4xl sm:text-5xl font-extrabold text-center"
                    style="text-shadow: 4px 4px 0px black;">
                    Kompetisi Cerdas Cermat Tingkat Nasional
                </h1>
                <p class="text-lg italic mt-2 text-white" style="text-shadow: 1px 1px 0px black;">"Pengetahuan dan
                    Tantangan untuk Perubahan Dunia"</p>
                <div class="bg-white text-gray-900 px-6 py-2 mt-4 rounded-full text-lg font-semibold">Rabu, 5 Februari
                    2025</div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white p-3 mt-auto w-full">
            <div class="flex justify-center gap-10 items-center w-full">
                <!-- Supported by Section -->
                <div class="flex items-center gap-4">
                    <p class="font-semibold">Supported by :</p>
                    <div class="flex gap-4">
                        <img class="w-8 h-8" src="{{ asset('storage/images/logo-foj.png') }}" alt="FOJ">
                        <img class="w-13 h-8" src="{{ asset('storage/images/logo-seputar-info-id.jpg') }} "
                            alt="Seputar Info Id">
                        <img class="w-13 h-8" src="{{ asset('storage/images/logo-lomba-sma.png') }}" alt="Lomba SMA">
                        <img class="w-13 h-8" src="{{ asset('storage/images/logo-pojok-event.jpeg') }}"
                            alt="Pojok Event">
                        <img class="w-13 h-8" src="{{ asset('storage/images/logo-partner-event.png') }}"
                            alt="Partner Event">
                    </div>
                </div>

                <!-- Sponsored By Section -->
                <div class="flex items-center gap-4">
                    <p class="font-semibold">Sponsored by :</p>
                    <div class="flex gap-4">
                        <img class="w-8 h-8" src="{{ asset('storage/images/logo-ss.jpeg') }}" alt="Spesial Sambal">
                        <img class="w-13 h-8" src="{{ asset('storage/images/logo-ruang-guru.jpg') }}" alt="Ruang Guru">
                        <img class="w-13 h-8" src="{{ asset('storage/images/logo-bank-jateng.jpg') }} "
                            alt="Bank Jateng">
                        <img class="w-10 h-8" src="{{ asset('storage/images/logo-virgin.png') }}" alt="Virgin">
                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>
