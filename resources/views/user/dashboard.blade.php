<x-guest-layout>
    <div class="w-screen flex flex-col items-center justify-center p-3">
        <!-- Title -->
        <h2 class="mt-0 mb-4 text-white text-4xl sm:text-5xl font-extrabold text-center drop-shadow-[4px_4px_0px_black]">
            {{ $stages->title }}
        </h2>

        <!-- Card Grid -->
        <div
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 w-full items-center justify-center">
            @foreach ($teams as $team)
                <div
                    class="bg-[#A8DADC] bg-opacity-70 border border-black rounded-xl shadow-lg p-3 flex flex-col items-center">
                    <img src="{{ asset('storage/logos/' . $team->logo) }}" alt="{{ $team->name }}"
                        class="w-24 h-24 mb-2">
                    <p class="text-1xl font-bold text-black text-center drop-shadow-[1px_1px_0px_white]">
                        {{ $team->name }}</p>
                    <p class="text-2xl font-bold text-yellow-400 text-center drop-shadow-[3px_2px_0px_black] score"
                        data-team-id="{{ $team->id }}">
                        {{ $team->score }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            console.log("Page loaded, initializing...");

            // Preload suara dengan query unik untuk menghindari cache
            let scoreChangeSound = new Audio("{{ asset('sounds/score-change.mp3') }}?v=" + Date.now());

            // Event click pertama untuk unlock audio autoplay
            document.body.addEventListener('click', () => {
                scoreChangeSound.play().then(() => scoreChangeSound.pause());
                console.log("Audio unlocked.");
            }, {
                once: true
            });

            // Fungsi untuk mengambil skor terbaru
            function fetchScores() {
                console.log("Fetching scores...");

                document.querySelectorAll('.score').forEach(scoreElement => {
                    const teamId = scoreElement.getAttribute('data-team-id');

                    fetch(`/user/dashboard/${teamId}/score`)
                        .then(response => response.json())
                        .then(data => {
                            console.log("Fetched data:", data);

                            if (data.success) {
                                const currentScore = parseInt(scoreElement.textContent);
                                const newScore = parseInt(data.new_score);

                                if (newScore !== currentScore) {
                                    console.log("Score changed! Playing sound...");

                                    // Update tampilan skor
                                    scoreElement.textContent = newScore;

                                    // Restart audio dari awal untuk setiap perubahan skor
                                    scoreChangeSound.currentTime = 0;
                                    scoreChangeSound.play().catch(error => console.error(
                                        "Gagal memutar audio:", error));
                                }
                            }
                        })
                        .catch(error => console.error('Error fetching scores:', error));
                });
            }

            // Jalankan fetch setiap 1 detik
            setInterval(fetchScores, 1000);
        });
    </script>
</x-guest-layout>
