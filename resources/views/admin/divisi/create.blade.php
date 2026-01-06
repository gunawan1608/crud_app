<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Divisi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

            <form method="POST" action="{{ route('divisi.store') }}">
                @csrf

                <div>
                    <label class="block mb-1">Nama Divisi</label>
                    <input type="text" name="nama_divisi"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <div class="mt-4 flex justify-end space-x-2">
                    <a href="{{ route('divisi.index') }}"
                       class="px-4 py-2 bg-gray-500 text-white rounded">
                        Kembali
                    </a>

                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
