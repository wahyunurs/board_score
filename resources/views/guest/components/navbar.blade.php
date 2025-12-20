<nav class="bg-transparent w-full">
    <div class="flex items-center justify-between mx-auto p-4 w-full">
        <div class="flex-1"></div>

        <div class="flex justify-center">
            <div class="flex justify-center gap-4 bg-white rounded-full py-2 px-6">
                @foreach ($headers as $header)
                    <img class="w-8 h-8" src="{{ asset('storage/images/header/' . $header->logo) }}"
                        alt="{{ $header->name }}">
                @endforeach
            </div>
        </div>

        <div class="flex-1 flex items-center justify-end gap-6">
            <a href="{{ route('login') }}"
                class="text-white border border-white rounded-full px-6 py-2 hover:bg-[#ffc800] hover:border-[#ffc800] hover:text-white transition-all duration-300">
                Login
            </a>
            <a href="{{ route('register') }}"
                class="text-white border border-white rounded-full px-6 py-2 hover:bg-[#ffc800] hover:border-[#ffc800] hover:text-white transition-all duration-300">
                Register
            </a>
        </div>
    </div>
</nav>
