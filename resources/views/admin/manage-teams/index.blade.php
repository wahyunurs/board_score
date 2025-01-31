<x-app-layout>
    <x-sidebar></x-sidebar>
    <x-navbar>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white light:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- Heading & Add New Team Button -->
                    <div class="flex items-center justify-between mb-3 p-4">
                        <h2 class="text-2xl font-bold text-gray-800 light:text-white ml-3">Data Teams</h2>
                        <button
                            class="text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mb-4"
                            data-modal-target="add-modal" data-modal-toggle="add-modal">
                            Add New Team
                        </button>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Logo</th>
                                <th scope="col" class="px-6 py-3">Team Name</th>
                                <th scope="col" class="px-6 py-3">Score</th>
                                <th scope="col" class="px-6 py-3">Update Score</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr class="bg-white border-b light:bg-gray-800 light:border-gray-700">
                                    <td class="px-6 py-1">
                                        <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}"
                                            class="w-16 h-16 rounded-full">
                                    </td>
                                    <td class="px-6 py-1 font-medium text-gray-900 light:text-white">
                                        {{ $team->name }}
                                    </td>
                                    <td id="score-{{ $team->id }}" class="score px-6 py-1"
                                        data-team-id="{{ $team->id }}">
                                        {{ $team->score }}
                                    </td>
                                    <td class="px-6 py-1">
                                        <form class="flex items-center gap-2 update-score-form"
                                            data-team-id="{{ $team->id }}">
                                            <input type="number" name="score"
                                                class="w-20 p-2 border rounded score-input" placeholder="0">
                                            <button type="button"
                                                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700 update-score-btn">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-1">
                                        <button type="button" data-modal-target="edit-modal-{{ $team->id }}"
                                            data-modal-toggle="edit-modal-{{ $team->id }}"
                                            class="edit-button text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                            Edit
                                        </button>

                                        |
                                        <button data-modal-target="delete-modal-{{ $team->id }}"
                                            data-modal-toggle="delete-modal-{{ $team->id }}"
                                            class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                @include('admin.manage-teams.edit-modal', ['team' => $team])
                                @include('admin.manage-teams.delete-modal', ['team' => $team])
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

        @include('admin.manage-teams.add-modal')

    </x-navbar>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Fungsi untuk mengambil skor terbaru
            function fetchScores() {
                document.querySelectorAll('.score').forEach(scoreElement => {
                    const teamId = scoreElement.getAttribute('data-team-id'); // Ambil teamId dari elemen

                    fetch(`/admin/manage-teams/${teamId}/score`) // Pastikan URL endpoint benar
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

            // Memperbarui skor setiap 1 detik
            setInterval(fetchScores, 1000); // Update skor setiap 1 detik
        });


        // Handle tombol update score
        document.querySelectorAll('.update-score-btn').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('.update-score-form');
                const teamId = form.dataset.teamId;
                const scoreInput = form.querySelector('.score-input').value;

                if (!scoreInput || isNaN(scoreInput)) {
                    alert('Please enter a valid score!');
                    return;
                }

                // AJAX request untuk memperbarui skor
                fetch(`/admin/manage-teams/${teamId}/update-score`, {
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
                        } else {
                            alert('Failed to update score!');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
</x-app-layout>
