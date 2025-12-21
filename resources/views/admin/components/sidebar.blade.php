<!-- Overlay backdrop (hanya untuk mobile) -->
<label for="menu-toggle"
    class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden peer-checked:block md:peer-checked:hidden transition-opacity duration-300 cursor-pointer"></label>

<!-- Sidebar -->
<aside x-data="{ openDropdown: false }"
    class="w-64 bg-white h-screen shadow-md fixed left-0 top-0 flex flex-col transform transition-transform duration-300 -translate-x-full md:translate-x-0 peer-checked:translate-x-0 md:peer-checked:-translate-x-full z-40">
    <!-- Logo -->
    <div class="flex items-center justify-center gap-2 px-6 py-4 border-b">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center">
            <div class="items-center justify-center text-3xl font-semibold">
                <span class="text-[#7100a1]">Score</span><span class="text-[#FBBF24]">Board</span>
            </div>
        </a>
    </div>

    <!-- Menu -->
    <nav class="flex-1 mt-4">
        <ul class="space-y-3">
            <li class="relative">
                @if (request()->routeIs('admin.dashboard'))
                    <span class="absolute left-0 top-0 bottom-0 w-1 bg-purple-600 rounded-r-lg"></span>
                @endif
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center mx-6 p-3 rounded-lg group {{ request()->routeIs('admin.dashboard') ? 'bg-purple-500 text-white' : 'hover:bg-purple-100' }}">
                    <svg class="shrink-0 w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="flex-1 ms-4 font-medium">Dashboard</span>
                </a>
            </li>
            @php
                $isLandingPageActive =
                    request()->routeIs('manage-events.index') ||
                    request()->routeIs('manage-headers.index') ||
                    request()->routeIs('manage-media-partners.index') ||
                    request()->routeIs('manage-sponsors.index');
            @endphp
            <li class="relative mx-6" x-data="{ open: {{ $isLandingPageActive ? 'true' : 'false' }} }">
                @if ($isLandingPageActive)
                    <span class="absolute left-0 top-0 bottom-0 w-1 bg-purple-600 rounded-r-lg"></span>
                @endif
                <button @click="open = !open" type="button"
                    class="flex items-center w-full p-2 rounded-lg group transition duration-75 {{ $isLandingPageActive ? 'bg-purple-500 text-white' : 'hover:bg-purple-100' }}">
                    <svg class="shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                        <path d="M2 12h20" />
                    </svg>
                    <span class="flex-1 ms-4 text-left font-medium">Landing Page</span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <ul x-show="open" x-transition class="mt-2 space-y-2 pl-4">
                    <li class="relative">
                        @if (request()->routeIs('manage-events.index'))
                            <span class="absolute left-0 top-0 bottom-0 w-1 bg-purple-600 rounded-r-lg"></span>
                        @endif
                        <a href="{{ route('manage-events.index') }}"
                            class="flex items-center p-2 rounded-lg group {{ request()->routeIs('manage-events.index') ? 'bg-purple-500 text-white' : 'hover:bg-purple-100' }}">
                            <svg class="shrink-0 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="flex-1 ms-3 text-sm font-medium">Kelola Acara</span>
                        </a>
                    </li>
                    <li class="relative">
                        @if (request()->routeIs('manage-headers.index'))
                            <span class="absolute left-0 top-0 bottom-0 w-1 bg-purple-600 rounded-r-lg"></span>
                        @endif
                        <a href="{{ route('manage-headers.index') }}"
                            class="flex items-center p-2 rounded-lg group {{ request()->routeIs('manage-headers.index') ? 'bg-purple-500 text-white' : 'hover:bg-purple-100' }}">
                            <svg class="shrink-0 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <rect width="18" height="12" x="3" y="4" rx="2" ry="2" />
                                <line x1="2" x2="22" y1="20" y2="20" />
                            </svg>
                            <span class="flex-1 ms-3 text-sm font-medium">Kelola Header</span>
                        </a>
                    </li>
                    <li class="relative">
                        @if (request()->routeIs('manage-media-partners.index'))
                            <span class="absolute left-0 top-0 bottom-0 w-1 bg-purple-600 rounded-r-lg"></span>
                        @endif
                        <a href="{{ route('manage-media-partners.index') }}"
                            class="flex items-center p-2 rounded-lg group {{ request()->routeIs('manage-media-partners.index') ? 'bg-purple-500 text-white' : 'hover:bg-purple-100' }}">
                            <svg class="shrink-0 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="15" rx="2" ry="2" />
                                <polyline points="17 2 12 7 7 2" />
                            </svg>
                            <span class="flex-1 ms-3 text-sm font-medium">Kelola Media Partner</span>
                        </a>
                    </li>
                    <li class="relative">
                        @if (request()->routeIs('manage-sponsors.index'))
                            <span class="absolute left-0 top-0 bottom-0 w-1 bg-purple-600 rounded-r-lg"></span>
                        @endif
                        <a href="{{ route('manage-sponsors.index') }}"
                            class="flex items-center p-2 rounded-lg group {{ request()->routeIs('manage-sponsors.index') ? 'bg-purple-500 text-white' : 'hover:bg-purple-100' }}">
                            <svg class="shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="8" r="7" />
                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
                            </svg>
                            <span class="flex-1 ms-3 text-sm font-medium">Kelola Sponsor</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="relative">
                @if (request()->routeIs('manage-users.index'))
                    <span class="absolute left-0 top-0 bottom-0 w-1 bg-purple-600 rounded-r-lg"></span>
                @endif
                <a href="{{ route('manage-users.index') }}"
                    class="flex mx-6 items-center p-2 rounded-lg group {{ request()->routeIs('manage-users.index') ? 'bg-purple-500 text-white' : 'hover:bg-purple-100' }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ms-4 font-medium">Kelola Pengguna</span>
                </a>
            </li>
            <li class="relative">
                @if (request()->routeIs('manage-teams.index'))
                    <span class="absolute left-0 top-0 bottom-0 w-1 bg-purple-600 rounded-r-lg"></span>
                @endif
                <a href="{{ route('manage-teams.index') }}"
                    class="flex items-center mx-6 p-2 rounded-lg group {{ request()->routeIs('manage-teams.index') ? 'bg-purple-500 text-white' : 'hover:bg-purple-100' }}">
                    <svg class="flex-shrink-0 w-5 h-5 transition duration-75" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M18 0H6a2 2 0 0 0-2 2h14v12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
                        <path
                            d="M14 4H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2ZM2 16v-6h12v6H2Z" />
                    </svg>
                    <span class="flex-1 ms-4 font-medium">Kelola Tim</span>
                </a>
            </li>
            <li class="relative">
                @if (request()->routeIs('manage-stages.index'))
                    <span class="absolute left-0 top-0 bottom-0 w-1 bg-purple-600 rounded-r-lg"></span>
                @endif
                <a href="{{ route('manage-stages.index') }}"
                    class="flex items-center mx-6 p-2 rounded-lg group {{ request()->routeIs('manage-stages.index') ? 'bg-purple-500 text-white' : 'hover:bg-purple-100' }}">
                    <svg class="w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="flex-1 ms-4 font-medium">Kelola Stage</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
