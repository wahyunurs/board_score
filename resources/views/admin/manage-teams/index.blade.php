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
                                New Team</button>
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
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
                                        <td id="score-{{ $team->id }}" class="px-6 py-1">
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
                                            <!-- Edit button for triggering the edit modal -->
                                            <button type="button"
                                                class="edit-button text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5"
                                                data-edit-team data-team-id="{{ $team->id }}"
                                                data-team-name="{{ $team->name }}"
                                                data-team-score="{{ $team->score }}" data-modal-target="edit-modal"
                                                data-modal-toggle="edit-modal">
                                                Edit
                                            </button>
                                            |
                                            <form action="{{ route('manage-teams.destroy', $team->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="edit-button text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5"
                                                    onclick="return confirm('Are you sure you want to delete this team?')">
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
        @include('admin.manage-teams.add-modal')
        <!-- Include edit mdal -->
        @include('admin.manage-teams.edit-modal')
    </x-navbar>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Handle update score button click
            document.querySelectorAll('.update-score-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('.update-score-form');
                    const teamId = form.dataset.teamId;
                    const scoreInput = form.querySelector('.score-input').value;

                    // AJAX request to update score
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
                                // Update score in the table
                                const scoreCell = document.getElementById(`score-${teamId}`);
                                scoreCell.textContent = data.new_score;
                            } else {
                                alert('Failed to update score!');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
</x-app-layout>
