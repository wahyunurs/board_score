<x-app-layout>
    <x-sidebar></x-sidebar>
    <x-navbar>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- Heading & Add New Stage Button -->
                    <div class="flex items-center justify-between mb-3 p-4">
                        <h2 class="text-2xl font-bold text-gray-800 light:text-white ml-3">Data Stages</h2>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Id</th>
                                <th scope="col" class="px-6 py-3">Title</th>
                                <th scope="col" class="px-6 py-3">Description</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stages as $stage)
                                <tr class="bg-white border-b light:bg-gray-800 light:border-gray-700">
                                    <td class="px-6 py-1">
                                        {{ $stage->id }}
                                    </td>
                                    <td class="px-6 py-1 font-medium text-gray-900 light:text-white">
                                        {{ $stage->title }}
                                    </td>
                                    <td class="px-6 py-1">
                                        {{ $stage->description }}
                                    </td>
                                    <td class="px-6 py-1">
                                        <!-- Edit button for triggering the edit modal -->
                                        <button type="button"
                                            class="edit-button text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5"data-modal-target="edit-modal"
                                            data-modal-toggle="edit-modal">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Include edit mdal -->
        @include('admin.manage-stages.edit-modal')
    </x-navbar>
</x-app-layout>
