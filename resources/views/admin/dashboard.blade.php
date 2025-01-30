<x-app-layout>
    <x-sidebar></x-sidebar>
    <x-navbar>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 light:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 light:text-gray-100">
                        {{ __('Its Admin Dashboard!') }}
                    </div>
                </div>
            </div>
        </div>
    </x-navbar>
</x-app-layout>
