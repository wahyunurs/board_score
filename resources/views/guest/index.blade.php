<x-guest-layout>
    <!-- NAVBAR GUEST -->
    @include('guest.components.navbar')

    <div class="overflow-y-auto w-full flex flex-col items-center mt-14">
        <!-- EVENT NAME -->
        <h1 class="mb-1 text-[#ffc800] text-5xl sm:text-7xl font-extrabold text-center drop-shadow-[4px_4px_0px_black]"
            style="font-family: 'Cinzel', serif;">
            KCC
        </h1>
        <h2 class="mb-4 text-[#ffc800] text-5xl sm:text-7xl font-bold text-center drop-shadow-[2px_2px_0px_black]"
            style="font-family: 'Cinzel', serif;">
            Kompetisi Cerdas Cermat
        </h2>

        <!-- NASIONAL -->
        <div class="bg-[#ffc800] p-3 text-center">
            <h3 class="text-white text-4xl sm:text-5xl font-extrabold" style="font-family: 'Archivo Black', sans-serif;">
                TINGKAT NASIONAL
            </h3>
        </div>

        <!-- THEME EVENT -->
        <div class="w-full bg-[#ffc800] p-3 text-center">
            <h3 class="text-white text-xl sm:text-3xl font-extrabold italic"
                style="font-family: 'Archivo Black', sans-serif;">
                "Menghidupkan Semangat Kebangsaan Melalui Generasi Cerdas"
            </h3>
        </div>
    </div>

    <!-- FOOTER GUEST -->
    @include('guest.components.footer')
</x-guest-layout>
