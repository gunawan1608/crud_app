<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <!-- Welcome Section -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-white mb-2">Akses Masuk Sistem</h2>
        <p class="text-sm text-slate-400">Autentikasi diperlukan untuk melanjutkan</p>
    </div>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-slate-300 mb-2.5">
                Email Korporat
            </label>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-500 group-focus-within:text-blue-400 transition" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <input id="email" class="input-dark w-full pl-12 pr-4 py-3.5 rounded-xl outline-none transition"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    placeholder="user@company.co.id" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-slate-300 mb-2.5">
                Kata Sandi
            </label>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-500 group-focus-within:text-blue-400 transition" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <input id="password" class="input-dark w-full pl-12 pr-4 py-3.5 rounded-xl outline-none transition"
                    type="password" name="password" required autocomplete="current-password"
                    placeholder="••••••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between pt-2">
            <div class="flex items-center">
                <input id="remember_me" type="checkbox"
                    class="h-4 w-4 text-blue-500 focus:ring-blue-500 bg-white/10 border-white/20 rounded cursor-pointer"
                    name="remember" />
                <label for="remember_me" class="ml-2.5 block text-sm text-slate-300 cursor-pointer select-none">
                    Tetap masuk
                </label>
            </div>

            @if (Route::has('password.request'))
                <a class="text-sm font-medium text-blue-400 hover:text-blue-300 transition"
                    href="{{ route('password.request') }}">
                    Reset password
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="pt-3">
            <button type="submit"
                class="w-full px-4 py-3.5 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-semibold rounded-xl hover:from-blue-500 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-transparent transition shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover-lift">
                Masuk ke Dashboard
            </button>
        </div>
    </form>
</x-guest-layout>
