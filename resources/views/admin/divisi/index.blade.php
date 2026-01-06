<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Divisi') }}
            </h2>

            <!-- Tombol CREATE -->
            <a href="{{ route('divisi.create') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded">
                + Tambah Divisi
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama Divisi</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($divisis as $divisi)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $divisi->nama_divisi }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                <!-- EDIT -->
                                <a href="{{ route('divisi.edit', $divisi) }}"
                                   class="px-3 py-1 bg-yellow-400 text-white rounded">
                                    Edit
                                </a>

                                <!-- DELETE -->
                                <form class="inline"
                                      method="POST"
                                      action="{{ route('divisi.destroy', $divisi) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        onclick="return confirm('Yakin hapus divisi ini?')"
                                        class="px-3 py-1 bg-red-600 text-white rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">
                                Data divisi kosong
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</x-app-layout>
