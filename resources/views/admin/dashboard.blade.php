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

                <!-- Konten Dashboard -->
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
            </div>
        </section>
    </main>

</x-app-layout>
