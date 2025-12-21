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
                            <li><a href="{{ route('admin.dashboard') }}" class="hover:underline text-purple-600">Admin</a>
                            </li>
                            <li><span class="text-purple-400">></span></li>
                            <li class="text-purple-700 font-semibold">Kelola Media Partner</li>
                        </ol>
                        <h1 class="text-3xl font-bold text-gray-800 mt-2">Kelola Media Partner</h1>
                    </nav>
                </div>

                <!-- Media Partner Table -->
                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-600">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            <h2 class="text-2xl font-bold text-gray-800">Data Media Partner</h2>
                        </div>
                        <button
                            class="text-white bg-green-500 hover:bg-green-600 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-150"
                            data-modal-target="add-modal" data-modal-toggle="add-modal">
                            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Media Partner
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-900 uppercase bg-green-50 font-extrabold">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <th scope="col" class="px-6 py-3">Nama</th>
                                    <th scope="col" class="px-6 py-3">Logo</th>
                                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                                    <th scope="col" class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mediaPartners as $mediaPartner)
                                    <tr class="bg-white border-b hover:bg-green-50 transition duration-150">
                                        <td class="px-6 py-4 text-gray-900">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ $mediaPartner->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <img src="{{ asset('storage/images/media-partner/' . $mediaPartner->logo) }}"
                                                alt="{{ $mediaPartner->name }}" class="w-16 h-16 object-contain">
                                        </td>
                                        <td class="px-6 py-4 text-gray-700">
                                            {{ $mediaPartner->description }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <button type="button"
                                                    data-modal-target="edit-modal-{{ $mediaPartner->id }}"
                                                    data-modal-toggle="edit-modal-{{ $mediaPartner->id }}"
                                                    class="edit-button text-white bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-4 py-2 transition duration-150 flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-pencil-icon lucide-pencil">
                                                        <path
                                                            d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                                        <path d="m15 5 4 4" />
                                                    </svg>
                                                    Edit
                                                </button>
                                                <button data-modal-target="delete-modal-{{ $mediaPartner->id }}"
                                                    data-modal-toggle="delete-modal-{{ $mediaPartner->id }}"
                                                    class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-4 py-2 transition duration-150 flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-trash-icon lucide-trash">
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                                        <path d="M3 6h18" />
                                                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Include edit & delete modal -->
                                    @include('admin.manage-media-partners.edit-modal', [
                                        'mediaPartner' => $mediaPartner,
                                    ])
                                    @include('admin.manage-media-partners.delete-modal', [
                                        'mediaPartner' => $mediaPartner,
                                    ])
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-16 h-16 text-gray-300 mb-2" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg>
                                                <p class="text-lg font-semibold">Tidak ada data media partner</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Include Add Modal -->
    @include('admin.manage-media-partners.add-modal')

</x-app-layout>
