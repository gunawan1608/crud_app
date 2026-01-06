<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Tombol Tambah --}}
            <div class="mb-4">
                <a href="{{ route('users.create') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    + Tambah User
                </a>
            </div>

            {{-- Alert --}}
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Divisi</th>
                            <th class="border px-4 py-2">Role</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)
                            <tr class="text-center">
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">
                                    {{ $user->divisi->nama_divisi ?? '-' }}
                                </td>
                               <td class="border px-4 py-2">
                                    <span class="px-2 py-1 rounded text-white
                                        {{ $user->role->name === 'admin' ? 'bg-red-500' : 'bg-gray-500' }}">
                                        {{ $user->role->name }}
                                    </span>
                                </td>

                                <td class="border px-4 py-2 space-x-2">
                                    {{-- Edit --}}
                                    <a href="{{ route('users.edit', $user) }}"
                                       class="px-3 py-1 bg-yellow-400 text-white rounded">
                                        Edit
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('users.destroy', $user) }}"
                                          method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Yakin hapus user ini?')"
                                            class="px-3 py-1 bg-red-600 text-white rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    Data user kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
