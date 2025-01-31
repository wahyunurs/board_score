<x-app-layout>
    <x-sidebar></x-sidebar>
    <x-navbar>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Card Users -->
                    <div class="bg-blue-200 dark:bg-blue-700 p-6 rounded-lg shadow-lg flex items-center">
                        <svg class="w-10 h-10 text-white dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-white dark:text-white">Users</h3>
                            <p class="text-2xl font-bold text-white dark:text-white">{{ $userCount }}</p>
                        </div>
                    </div>

                    <!-- Card Teams -->
                    <div class="bg-blue-200 dark:bg-blue-700 p-6 rounded-lg shadow-lg flex items-center">
                        <svg class="w-10 h-10 text-white dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M18 0H6a2 2 0 0 0-2 2h14v12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
                            <path
                                d="M14 4H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2ZM2 16v-6h12v6H2Z" />
                        </svg>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-white dark:text-white">Teams</h3>
                            <p class="text-2xl font-bold text-white dark:text-white">{{ $teamCount }}</p>
                        </div>
                    </div>

                    <!-- Card Stages -->
                    <div class="bg-blue-200 dark:bg-blue-700 p-6 rounded-lg shadow-lg flex items-center">
                        <svg class="w-10 h-10 text-white dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-white dark:text-white">Stages</h3>
                            <p class="text-2xl font-bold text-white dark:text-white">{{ $stageCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-navbar>
</x-app-layout>
