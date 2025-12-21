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
                            <li class="text-purple-700 font-semibold">Kelola Tim</li>
                        </ol>
                        <h1 class="text-3xl font-bold text-gray-800 mt-2">Kelola Tim</h1>
                    </nav>
                </div>

                <!-- Teams Table -->
                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-600">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-blue-600 mr-3" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M18 0H6a2 2 0 0 0-2 2h14v12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
                                <path
                                    d="M14 4H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2ZM2 16v-6h12v6H2Z" />
                            </svg>
                            <h2 class="text-2xl font-bold text-gray-800">Data Tim</h2>
                        </div>
                        <button
                            class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-150"
                            data-modal-target="add-modal" data-modal-toggle="add-modal">
                            <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Tim
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-900 uppercase bg-blue-50 font-extrabold">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Logo</th>
                                    <th scope="col" class="px-6 py-3">Nama Tim</th>
                                    <th scope="col" class="px-6 py-3">Skor</th>
                                    <th scope="col" class="px-6 py-3">Update Skor</th>
                                    <th scope="col" class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($teams as $team)
                                    <tr class="bg-white border-b hover:bg-blue-50 transition duration-150">
                                        <td class="px-6 py-4">
                                            <img src="{{ asset('storage/images/logo-tim/' . $team->logo) }}"
                                                alt="{{ $team->name }}"
                                                class="w-12 h-12 rounded-full object-cover border-2 border-blue-200">
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ $team->name }}
                                        </td>
                                        <td id="score-{{ $team->id }}"
                                            class="score px-6 py-4 text-gray-900 font-bold"
                                            data-team-id="{{ $team->id }}">
                                            {{ $team->score }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <form class="flex items-center gap-2 update-score-form"
                                                data-team-id="{{ $team->id }}">
                                                <input type="number" name="score"
                                                    class="w-20 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 score-input"
                                                    placeholder="0">
                                                <button type="button"
                                                    class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-150 update-score-btn flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="lucide lucide-refresh-ccw-icon lucide-refresh-ccw">
                                                        <path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                                                        <path d="M3 3v5h5" />
                                                        <path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16" />
                                                        <path d="M16 16h5v5" />
                                                    </svg>
                                                    Update
                                                </button>
                                            </form>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <button type="button"
                                                    data-modal-target="edit-modal-{{ $team->id }}"
                                                    data-modal-toggle="edit-modal-{{ $team->id }}"
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
                                                <button data-modal-target="delete-modal-{{ $team->id }}"
                                                    data-modal-toggle="delete-modal-{{ $team->id }}"
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
                                    @include('admin.manage-teams.edit-modal', ['team' => $team])
                                    @include('admin.manage-teams.delete-modal', ['team' => $team])
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-16 h-16 text-gray-300 mb-2" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                                </svg>
                                                <p class="text-lg font-semibold">Tidak ada data tim</p>
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

    @include('admin.manage-teams.add-modal')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Fungsi untuk mengambil skor terbaru secara realtime
            function fetchScores() {
                document.querySelectorAll('.score').forEach(scoreElement => {
                    const teamId = scoreElement.getAttribute('data-team-id');

                    fetch(`/admin/kelola-tim/${teamId}/score`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Perbarui elemen skor dengan nilai baru
                                scoreElement.textContent = data.new_score;
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            }

            // Memperbarui skor setiap 1 detik untuk realtime display
            setInterval(fetchScores, 1000);
        });

        // Handle tombol update score (hanya update saat button diklik)
        document.querySelectorAll('.update-score-btn').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('.update-score-form');
                const teamId = form.dataset.teamId;
                const scoreInputElement = form.querySelector('.score-input');
                const scoreInput = scoreInputElement.value;

                if (!scoreInput || isNaN(scoreInput)) {
                    alert('Please enter a valid score!');
                    return;
                }

                // AJAX request untuk memperbarui skor
                fetch(`/admin/kelola-tim/${teamId}/update-score`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            score: scoreInput
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update tampilan skor
                            const scoreCell = document.getElementById(`score-${teamId}`);
                            scoreCell.textContent = data.new_score;

                            // Clear input field setelah berhasil update
                            scoreInputElement.value = '';
                        } else {
                            alert('Failed to update score!');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
</x-app-layout>
