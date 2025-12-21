<x-app-layout>
    <!-- Sidebar toggle controller (peer) -->
    <input id="menu-toggle" type="checkbox" class="peer sr-only" />

    <!-- Sidebar Admin -->
    @include('admin.components.sidebar')

    <!-- Navbar Admin -->
    @include('admin.components.navbar')

    <!-- Main Content -->
    <main class="ml-0 md:ml-64 peer-checked:md:ml-0 transition-all duration-300">
        <section class="pt-24 pb-10 bg-[#f0e8f0] min-h-screen">
            <div class="max-w-7xl mx-auto px-3">
                <!-- Heading dan Breadcrumb -->
                <div class="mb-6">
                    <nav class="text-sm text-gray-500">
                        <ol class="list-reset flex items-center space-x-2">
                            <li><a href="{{ route('admin.dashboard') }}"
                                    class="hover:underline text-purple-600">Admin</a>
                            </li>
                            <li><span class="text-purple-400">></span></li>
                            <li class="text-purple-700 font-semibold">Dashboard</li>
                        </ol>
                        <h1 class="text-3xl font-bold text-gray-800 mt-2">Admin Dashboard</h1>
                    </nav>
                </div>

                <!-- Welcome Section -->
                <div class="mb-6 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg shadow-lg p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold mb-2">Selamat Datang, Admin! 👋</h2>
                            <p class="text-purple-100">Kelola event dan data dengan mudah melalui dashboard ini.</p>
                        </div>
                        <div class="hidden md:block">
                            <svg class="w-24 h-24 text-white opacity-20" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M16.051 12.616a1 1 0 0 1 1.909.024l.737 1.452a1 1 0 0 0 .737.535l1.634.256a1 1 0 0 1 .588 1.806l-1.172 1.168a1 1 0 0 0-.282.866l.259 1.613a1 1 0 0 1-1.541 1.134l-1.465-.75a1 1 0 0 0-.912 0l-1.465.75a1 1 0 0 1-1.539-1.133l.258-1.613a1 1 0 0 0-.282-.866l-1.156-1.153a1 1 0 0 1 .572-1.822l1.633-.256a1 1 0 0 0 .737-.535z" />
                                <path d="M8 15H7a4 4 0 0 0-4 4v2" />
                                <circle cx="10" cy="7" r="4" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Count Table -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Users Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 flex items-center border-l-4 border-purple-600">
                        <div class="text-purple-600 mr-4">
                            <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Total Pengguna</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $userCount }}</h3>
                        </div>
                    </div>

                    <!-- Teams Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 flex items-center border-l-4 border-blue-600">
                        <div class="text-blue-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                <path d="M3 9h18M9 21V9" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Total Tim</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $teamCount }}</h3>
                        </div>
                    </div>

                    <!-- Media Partner Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 flex items-center border-l-4 border-green-600">
                        <div class="text-green-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="15" rx="2" ry="2" />
                                <polyline points="17 2 12 7 7 2" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Media Partner</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $mediaPartnerCount }}</h3>
                        </div>
                    </div>

                    <!-- Sponsor Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 flex items-center border-l-4 border-yellow-600">
                        <div class="text-yellow-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="8" r="7" />
                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Total Sponsor</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $sponsorCount }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Informasi Event -->
                @if ($events)
                    <div class="mb-6 mt-6 bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-600">
                        <div class="flex items-center mb-4">
                            <svg class="w-8 h-8 text-purple-600 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.706 2.706 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                            </svg>
                            <h2 class="text-2xl font-bold text-gray-800">Informasi Event</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-purple-50 rounded-lg p-4">
                                <p class="text-sm text-gray-600 mb-1">Judul Singkat</p>
                                <p class="text-lg font-bold text-purple-700">{{ $events->short_title ?? '-' }}</p>
                            </div>
                            <div class="bg-purple-50 rounded-lg p-4">
                                <p class="text-sm text-gray-600 mb-1">Judul Lengkap</p>
                                <p class="text-lg font-bold text-purple-700">{{ $events->long_title ?? '-' }}</p>
                            </div>
                            <div class="bg-blue-50 rounded-lg p-4">
                                <p class="text-sm text-gray-600 mb-1">Tema</p>
                                <p class="text-lg font-semibold text-blue-700">{{ $events->theme ?? '-' }}</p>
                            </div>
                            <div class="bg-green-50 rounded-lg p-4">
                                <p class="text-sm text-gray-600 mb-1">Tanggal</p>
                                <p class="text-lg font-semibold text-green-700">
                                    {{ $events->date ? \Carbon\Carbon::parse($events->date)->format('d F Y') : '-' }}
                                </p>
                            </div>
                            <div class="bg-yellow-50 rounded-lg p-4">
                                <p class="text-sm text-gray-600 mb-1">Lokasi</p>
                                <p class="text-lg font-semibold text-yellow-700">{{ $events->location ?? '-' }}</p>
                            </div>
                            <div class="bg-pink-50 rounded-lg p-4">
                                <p class="text-sm text-gray-600 mb-1">Deskripsi</p>
                                <p class="text-lg font-semibold text-pink-700">{{ $events->description ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </section>
    </main>

</x-app-layout>
