<x-app-layout>
    <x-sidebar></x-sidebar>
    <x-navbar>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <h2 class="text-2xl font-bold text-gray-800 light:text-white p-4">Data Users</h2>

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-white border-b light:bg-gray-800 light:border-gray-700">
                                        <td class="px-6 py-1">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-6 py-1 font-medium text-gray-900 light:text-white">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-1">
                                            {{ $user->role }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-navbar>
</x-app-layout>
