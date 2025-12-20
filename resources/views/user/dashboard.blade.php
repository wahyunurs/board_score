<x-guest-layout>
    <!-- NAVBAR USER -->
    @include('user.components.navbar')

    <div class="overflow-y-auto w-full flex flex-col items-center justify-start">
        <!-- EVENT NAME -->
        <h1 class="mt-0 mb-1 text-[#ffc800] text-6xl sm:text-7xl font-extrabold text-center drop-shadow-[4px_4px_0px_black]"
            style="font-family: 'Cinzel', serif;">
            {{ $events->short_title ?? 'KCC' }}
        </h1>
        <h2 class="mb-4 text-[#ffc800] text-2xl sm:text-3xl font-bold text-center drop-shadow-[2px_2px_0px_black]"
            style="font-family: 'Cinzel', serif;">
            {{ $events->long_title ?? 'Kompetisi Cerdas Cermat' }}
        </h2>

        <!-- STAGE TITLE -->
        <div class="w-full bg-[#ffc800] p-3 text-center mb-5">
            <h3 class="text-white text-4xl sm:text-5xl font-extrabold" style="font-family: 'Archivo Black', sans-serif;">
                {{ $stages->title }}
            </h3>
        </div>

        <!-- TEAMS CARD -->
        <div
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 w-full items-center justify-center px-3">
            @foreach ($teams as $team)
                <div class="bg-[#54326d] border border-[#ffc800] rounded-xl shadow-lg flex flex-col items-center h-64">
                    <div class="h-32 w-full flex items-center justify-center">
                        <img src="{{ asset('storage/images/logo-tim/' . $team->logo) }}" alt="{{ $team->name }}"
                            class="w-28 h-28" />
                    </div>
                    <div class="h-20 w-full flex items-center justify-center px-2">
                        <p class="text-2xl font-bold text-white text-center" style="font-family: 'Geom', sans-serif;">
                            {{ $team->name }}</p>
                    </div>
                    <div class="h-12 w-full bg-[#ffc800] flex items-center justify-center rounded-b-xl">
                        <p class="text-2xl font-bold text-white text-center score" data-team-id="{{ $team->id }}"
                            style="font-family: 'Sekuya', sans-serif;">
                            {{ $team->score }}
                        </p>
                    </div>
                </div>
            @endforeach
            @foreach ($teams as $team)
                <div class="bg-[#54326d] border border-[#ffc800] rounded-xl shadow-lg flex flex-col items-center h-64">
                    <div class="h-32 w-full flex items-center justify-center">
                        <img src="{{ asset('storage/images/logo-tim/' . $team->logo) }}" alt="{{ $team->name }}"
                            class="w-28 h-28" />
                    </div>
                    <div class="h-20 w-full flex items-center justify-center px-2">
                        <p class="text-2xl font-bold text-white text-center" style="font-family: 'Geom', sans-serif;">
                            {{ $team->name }}</p>
                    </div>
                    <div class="h-12 w-full bg-[#ffc800] flex items-center justify-center rounded-b-xl">
                        <p class="text-2xl font-bold text-white text-center score" data-team-id="{{ $team->id }}"
                            style="font-family: 'Sekuya', sans-serif;">
                            {{ $team->score }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- FOOTER USER -->
    @include('user.components.footer')

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
