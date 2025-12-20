<x-guest-layout>
    <!-- NAVBAR GUEST -->
    @include('guest.components.navbar')

    <div class="overflow-y-auto w-full flex flex-col items-center mt-14">
        <!-- EVENT NAME -->
        <h1 class="mb-1 text-[#ffc800] text-5xl sm:text-7xl font-extrabold text-center drop-shadow-[4px_4px_0px_black]"
            style="font-family: 'Cinzel', serif;">
            {{ $events->short_title ?? 'KCC' }}
        </h1>
        <h2 class="mb-4 text-[#ffc800] text-5xl sm:text-7xl font-bold text-center drop-shadow-[2px_2px_0px_black]"
            style="font-family: 'Cinzel', serif;">
            {{ $events->long_title ?? 'Kompetisi Cerdas Cermat' }}
        </h2>

        <!-- THEME EVENT -->
        <div class="w-full bg-[#ffc800] p-3 text-center">
            <h3 class="text-white text-xl sm:text-3xl font-extrabold italic"
                style="font-family: 'Archivo Black', sans-serif;">
                "{{ $events->theme ?? 'Menghidupkan Semangat Kebangsaan Melalui Generasi Cerdas' }}"
            </h3>
        </div>

        <!-- DATE AND LOCATION -->
        <div class="w-full max-w-4xl mt-6 flex flex-col items-center gap-3 px-4">
            @if ($events && $events->date)
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-6 h-6 text-white drop-shadow-[2px_2px_0px_orange]" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <p class="text-white text-lg font-bold drop-shadow-[2px_2px_0px_orange]">
                        {{ \Carbon\Carbon::parse($events->date)->format('d F Y') }}
                    </p>
                </div>
            @endif

            @if ($events && $events->location)
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-6 h-6 text-white drop-shadow-[2px_2px_0px_orange]" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <p class="text-white text-lg font-bold drop-shadow-[2px_2px_0px_orange]">
                        {{ $events->location }}
                    </p>
                </div>
            @endif
        </div>
    </div>

    <!-- FOOTER GUEST -->
    @include('guest.components.footer')
</x-guest-layout>
