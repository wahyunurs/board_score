<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md">
            <h2 class="text-xl font-bold text-center mb-4">Login</h2>
            <form class="max-w-sm mx-auto" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-5">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username"
                        placeholder="youremail@gmail.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                        <input id="remember_me" type="checkbox"
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 light:bg-gray-700 light:border-gray-600 light:focus:ring-blue-600 light:ring-offset-gray-800 light:focus:ring-offset-gray-800"
                            required name="remember">
                    </div>
                    <label for="remember_me" class="inline-flex items-center">
                        <span
                            class="ms-2 text-sm font-medium text-gray-900 light:text-gray-300">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Forgot Password -->
                <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-400 light:text-gray-400 hover:text-blue-500 light:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 light:focus:ring-offset-gray-800"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-700 light:text-gray-400 hover:text-blue-500 light:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 light:focus:ring-offset-gray-800"
                        href="{{ route('register') }}">
                        {{ __('Not registered?') }}
                    </a>

                    <x-primary-button class="ms-3">
                        {{ __('Login') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
