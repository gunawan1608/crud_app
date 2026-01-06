<x-app-layout>
    <x-slot name="header">
        <h2>Tambah User</h2>
    </x-slot>

    <form method="POST" action="{{ route('users.store') }}" class="p-6">
        @csrf

        <input name="name" placeholder="Nama" class="border p-2 w-full mb-2">
        <input name="email" placeholder="Email" class="border p-2 w-full mb-2">
        <input type="password" name="password" placeholder="Password" class="border p-2 w-full mb-2">

        <select name="divisi_id" class="border p-2 w-full mb-2">
            <option value="">-- Pilih Divisi --</option>
            @foreach ($divisis as $divisi)
                <option value="{{ $divisi->id }}">
                    {{ $divisi->nama_divisi }}
                </option>
            @endforeach
        </select>

        <select name="role_id" class="border p-2 w-full mb-4">
            <option value="">-- Pilih Role --</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">
                    {{ $role->name }}
                </option>
            @endforeach
        </select>


        <button class="bg-green-500 text-white px-4 py-2" >
            Simpan
        </button>
    </form>
</x-app-layout>
