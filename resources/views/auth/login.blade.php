<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Masuk</h2>
        <p class="text-sm text-gray-600 mt-1">Silakan masuk dengan akun yang telah diberikan</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                Email
            </label>
            <input
                id="email"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="nama@email.com"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                Password
            </label>
            <input
                id="password"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Masukkan password Anda"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input
                id="remember_me"
                type="checkbox"
                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                name="remember"
            />
            <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                Ingat saya
            </label>
        </div>

        <!-- Actions -->
        <div class="space-y-4">
            <button
                type="submit"
                class="w-full px-4 py-2.5 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition"
            >
                Masuk
            </button>

            @if (Route::has('password.request'))
                <div class="text-center">
                    <a class="text-sm text-blue-600 hover:text-blue-700 hover:underline"
                       href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                </div>
            @endif
        </div>
    </form>

    <!-- Info -->
    <div class="mt-6 pt-6 border-t border-gray-200">
        <p class="text-xs text-center text-gray-500">
            Belum memiliki akun? Hubungi administrator untuk mendapatkan akses ke sistem.
        </p>
    </div>
</x-guest-layout>
