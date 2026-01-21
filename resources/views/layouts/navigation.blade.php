<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo / Brand -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="hidden sm:block">
                            <span class="font-bold text-gray-900 text-base">Arsip Digital</span>
                            <div class="text-[10px] text-gray-500 font-medium tracking-wide uppercase">Management System</div>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:ms-10 sm:flex items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                        class="px-4 py-2 text-sm font-medium border-b-2 transition-colors
                               {{ request()->routeIs('dashboard') 
                                  ? 'border-blue-600 text-blue-600' 
                                  : 'border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300' }}">
                        Dashboard
                    </x-nav-link>

                    @auth
                        @if (auth()->user()->role->name === 'admin')
                            <x-nav-link :href="route('divisi.index')" :active="request()->routeIs('divisi.*')"
                                class="px-4 py-2 text-sm font-medium border-b-2 transition-colors
                                       {{ request()->routeIs('divisi.*') 
                                          ? 'border-blue-600 text-blue-600' 
                                          : 'border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300' }}">
                                Divisi
                            </x-nav-link>
                            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')"
                                class="px-4 py-2 text-sm font-medium border-b-2 transition-colors
                                       {{ request()->routeIs('users.*') 
                                          ? 'border-blue-600 text-blue-600' 
                                          : 'border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300' }}">
                                Users
                            </x-nav-link>
                            <x-nav-link :href="route('admin.arsip.index')" :active="request()->routeIs('admin.arsip.*')"
                                class="px-4 py-2 text-sm font-medium border-b-2 transition-colors
                                       {{ request()->routeIs('admin.arsip.*') 
                                          ? 'border-blue-600 text-blue-600' 
                                          : 'border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300' }}">
                                Arsip
                            </x-nav-link>
                        @else
                            <x-nav-link :href="route('arsip.index')" :active="request()->routeIs('arsip.*')"
                                class="px-4 py-2 text-sm font-medium border-b-2 transition-colors
                                       {{ request()->routeIs('arsip.*') 
                                          ? 'border-blue-600 text-blue-600' 
                                          : 'border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300' }}">
                                Arsip
                            </x-nav-link>
                            <x-nav-link :href="route('surat-templates.index')" :active="request()->routeIs('surat-templates.*')"
                                class="px-4 py-2 text-sm font-medium border-b-2 transition-colors
                                       {{ request()->routeIs('surat-templates.*') 
                                          ? 'border-blue-600 text-blue-600' 
                                          : 'border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300' }}">
                                Templates
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="72">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium bg-white hover:bg-gray-50 focus:outline-none focus:border-blue-500 transition-colors">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-600 flex items-center justify-center">
                                    <span class="text-sm font-semibold text-white">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </span>
                                </div>
                                <div class="text-left hidden lg:block">
                                    <div class="font-semibold text-gray-900 text-sm leading-tight">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-gray-500 capitalize">{{ Auth::user()->role->name }}</div>
                                </div>
                            </div>
                            <svg class="ms-2 h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-white border border-gray-200 shadow-lg">
                            <!-- Profile Header -->
                            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                                <div class="flex items-start space-x-4">
                                    <div class="w-14 h-14 bg-blue-600 flex items-center justify-center flex-shrink-0">
                                        <span class="text-xl font-bold text-white">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-semibold text-gray-900 text-sm mb-0.5">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-600 mb-2">{{ Auth::user()->email }}</p>
                                        <span class="inline-block px-2.5 py-1 text-xs font-medium bg-blue-100 text-blue-700 border border-blue-200">
                                            {{ ucfirst(Auth::user()->role->name) }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Account Information -->
                            <div class="px-6 py-3 border-b border-gray-200">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Informasi Akun</p>
                                <div class="space-y-1.5">
                                    <div class="flex justify-between text-xs">
                                        <span class="text-gray-600">Status</span>
                                        <span class="font-medium text-green-600">● Aktif</span>
                                    </div>
                                    <div class="flex justify-between text-xs">
                                        <span class="text-gray-600">Level Akses</span>
                                        <span class="font-medium text-gray-900 capitalize">{{ Auth::user()->role->name }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Logout -->
                            <div class="p-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2.5 text-sm font-medium text-red-700 hover:bg-red-50 transition-colors">
                                        Keluar dari Sistem
                                    </button>
                                </form>
                            </div>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none transition-colors">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-gray-200 bg-gray-50">
        <div class="pt-2 pb-3 space-y-1 px-3">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="block px-4 py-2.5 text-sm font-medium border-l-4 transition-colors
                       {{ request()->routeIs('dashboard') 
                          ? 'border-blue-600 text-blue-600 bg-blue-50' 
                          : 'border-transparent text-gray-600 hover:bg-white hover:border-gray-300' }}">
                Dashboard
            </x-responsive-nav-link>

            @auth
                @if (auth()->user()->role->name === 'admin')
                    <x-responsive-nav-link :href="route('divisi.index')" :active="request()->routeIs('divisi.*')"
                        class="block px-4 py-2.5 text-sm font-medium border-l-4 transition-colors
                               {{ request()->routeIs('divisi.*') 
                                  ? 'border-blue-600 text-blue-600 bg-blue-50' 
                                  : 'border-transparent text-gray-600 hover:bg-white hover:border-gray-300' }}">
                        Divisi
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')"
                        class="block px-4 py-2.5 text-sm font-medium border-l-4 transition-colors
                               {{ request()->routeIs('users.*') 
                                  ? 'border-blue-600 text-blue-600 bg-blue-50' 
                                  : 'border-transparent text-gray-600 hover:bg-white hover:border-gray-300' }}">
                        Users
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.arsip.index')" :active="request()->routeIs('admin.arsip.*')"
                        class="block px-4 py-2.5 text-sm font-medium border-l-4 transition-colors
                               {{ request()->routeIs('admin.arsip.*') 
                                  ? 'border-blue-600 text-blue-600 bg-blue-50' 
                                  : 'border-transparent text-gray-600 hover:bg-white hover:border-gray-300' }}">
                        Arsip
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('arsip.index')" :active="request()->routeIs('arsip.*')"
                        class="block px-4 py-2.5 text-sm font-medium border-l-4 transition-colors
                               {{ request()->routeIs('arsip.*') 
                                  ? 'border-blue-600 text-blue-600 bg-blue-50' 
                                  : 'border-transparent text-gray-600 hover:bg-white hover:border-gray-300' }}">
                        Arsip
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('surat-templates.index')" :active="request()->routeIs('surat-templates.*')"
                        class="block px-4 py-2.5 text-sm font-medium border-l-4 transition-colors
                               {{ request()->routeIs('surat-templates.*') 
                                  ? 'border-blue-600 text-blue-600 bg-blue-50' 
                                  : 'border-transparent text-gray-600 hover:bg-white hover:border-gray-300' }}">
                        Templates
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        <!-- Responsive User Info -->
        <div class="pt-4 pb-3 border-t border-gray-200 bg-white">
            <div class="px-4 mb-3">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-blue-600 flex items-center justify-center flex-shrink-0">
                        <span class="text-base font-bold text-white">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-gray-900 text-sm">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-600">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="inline-block px-2.5 py-1 text-xs font-medium bg-blue-100 text-blue-700 border border-blue-200">
                        {{ ucfirst(Auth::user()->role->name) }}
                    </span>
                </div>
            </div>

            <div class="px-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2.5 text-sm font-medium text-red-700 hover:bg-red-50 border-l-4 border-transparent hover:border-red-300 transition-colors">
                        Keluar dari Sistem
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>