<!-- Footer -->
<footer class="bg-gray-900 text-white p-3 mt-auto w-full">
    <div class="flex justify-center gap-10 items-center w-full">
        <!-- Supported by Section -->
        <div class="flex items-center gap-4">
            <p class="font-semibold">Supported by :</p>
            <div class="flex gap-4">
                @foreach ($mediaPartners as $mediaPartner)
                    <img class="w-13 h-8" src="{{ asset('storage/images/media-partner/' . $mediaPartner->logo) }}"
                        alt="{{ $mediaPartner->name }}">
                @endforeach
            </div>
        </div>

        <!-- Sponsored By Section -->
        <div class="flex items-center gap-4">
            <p class="font-semibold">Sponsored by :</p>
            <div class="flex gap-4">
                @foreach ($sponsors as $sponsor)
                    <img class="w-13 h-8" src="{{ asset('storage/images/sponsor/' . $sponsor->logo) }}"
                        alt="{{ $sponsor->name }}">
                @endforeach
            </div>
        </div>
    </div>
</footer>
