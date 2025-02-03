<nav class="bg-gray-900 border-gray-200 dark:bg-gray-900 w-full">
    <div class="flex items-center justify-between mx-auto p-4 w-full">
        <div class="flex-1 flex justify-center gap-4">
            <img class="w-8 h-8" src="{{ asset('images/logo-udinus.png') }}" alt="Udinus">
            <img class="w-8 h-8" src="{{ asset('images/logo-unggul.png') }}" alt="Unggul">
            <img class="w-8 h-8" src="{{ asset('images/logo-dpm.png') }}" alt="DPMKM Udinus">
            <img class="w-8 h-8" src="{{ asset('images/logo-parlemen.png') }}" alt="Parlemen">
            <img class="w-8 h-8" src="{{ asset('images/logo-dinusfest.png') }}" alt="Dinus Fest">
            <img class="w-8 h-8" src="{{ asset('images/logo-gkc.png') }}" alt="GKC">
        </div>

        <div class="flex items-center space-x-3 justify-end">
            <!-- Tombol User -->
            <button id="user-menu-button" data-dropdown-toggle="user-dropdown" type="button"
                class="flex text-sm rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 20h14v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2zm7-10a4 4 0 100-8 4 4 0 000 8z"></path>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div id="user-dropdown" class="hidden z-50 w-44 bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                    <span
                        class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="user-menu-button">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profil</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
