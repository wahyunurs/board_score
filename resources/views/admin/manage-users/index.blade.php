<x-app-layout>
    <x-sidebar></x-sidebar>
    <x-navbar>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex justify-end mb-4">
                            <!-- Button to trigger add modal -->
                            <button
                                class="text-white bg-blue-600 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mb-4"
                                data-modal-target="add-modal">Add
                                New User</button>
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">Eamil</th>
                                    <th scope="col" class="px-6 py-3">Role</th>
                                    <th scope="col" class="px-6 py-3">Actions</th>
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
                                        <td class="px-6 py-1">
                                            <!-- Edit button for triggering the edit modal -->
                                            <button type="button"
                                                class="edit-button text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5"
                                                data-edit-user data-user-id="{{ $user->id }}"
                                                data-user-name="{{ $user->name }}"
                                                data-user-email="{{ $user->email }}"
                                                data-user-role="{{ $user->role }}" data-modal-target="edit-modal"
                                                data-modal-toggle="edit-modal">
                                                Edit
                                            </button>
                                            |
                                            <form action="{{ route('manage-users.destroy', $user->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="edit-button text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Include add mdal -->
        @include('admin.manage-users.add-modal')
        <!-- Include edit mdal -->
        @include('admin.manage-users.edit-modal')
    </x-navbar>
</x-app-layout>
