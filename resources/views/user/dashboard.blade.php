<x-guest-layout>
    <div class="container mx-auto p-4 flex flex-col items-center">
        <!-- H2 akan selalu di atas dan card akan menyesuaikan ke bawah -->
        <h2 class="mt-0 mb-4 text-white text-4xl sm:text-5xl font-extrabold text-center drop-shadow-[4px_4px_0px_black]">
            BABAK SEMIFINAL
        </h2>

        <!-- Grid untuk menampilkan card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 w-full">
            @foreach ($teams as $team)
                <!-- Card -->
                <div
                    class="bg-[#A8DADC] bg-opacity-70 border border-black rounded-xl shadow-lg p-2 flex flex-col items-center">
                    <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}"
                        class="w-24 h-24 rounded-full mb-2">
                    <h2 class="text-2xl font-bold">{{ $team->name }}</h2>
                    <p class="text-2xl font-bold text-yellow-600">
                        {{ $team->score }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Fungsi u   ntuk mengambil skor terbaru
            function fetchScores() {
                // Looping melalui setiap elemen dengan class 'score'
                document.querySelectorAll('.score').forEach(scoreElement => {
                    const teamId = scoreElement.getAttribute(
                        'data-team-id'); // Mengambil ID tim dari atribut data-team-id

                    // AJAX request untuk mengambil data skor terbaru
                    fetch(`/user/dashboard/${teamId}/score`) // Pastikan endpoint ini sudah benar
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Memperbarui tampilan skor pada setiap card
                                scoreElement.textContent = data.new_score;
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            }

            // Mengambil skor setiap 1 detik (1000 ms)
            setInterval(fetchScores, 1000); // Update skor setiap 1 detik
        });
    </script>
</x-guest-layout>
