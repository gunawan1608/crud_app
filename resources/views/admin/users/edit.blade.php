<x-app-layout>
    <x-slot name="header">
        <h2>Edit User</h2>
    </x-slot>

    <form method="POST" action="{{ route('users.update', $user) }}" class="p-6">
        @csrf
        @method('PUT')

        <input name="name"
               value="{{ old('name', $user->name) }}"
               class="border p-2 w-full mb-2">

        <input name="email"
               value="{{ old('email', $user->email) }}"
               class="border p-2 w-full mb-2">

        <input type="password"
               name="password"
               placeholder="Password baru (kosongkan jika tidak diubah)"
               class="border p-2 w-full mb-2">

        <select name="divisi_id" class="border p-2 w-full mb-2">
            @foreach ($divisis as $divisi)
                <option value="{{ $divisi->id }}"
                    {{ $user->divisi_id == $divisi->id ? 'selected' : '' }}>
                    {{ $divisi->nama_divisi }}
                </option>
            @endforeach
        </select>

        <select name="role_id" class="border p-2 w-full mb-4">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}"
                    {{ $user->role_id == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>

        <button class="bg-green-500 text-white px-4 py-2 rounded">
            Update
        </button>

        <a href="{{ route('users.index') }}"
           class="ml-2 px-4 py-2 bg-gray-500 text-white rounded">
            Batal
        </a>
    </form>
</x-app-layout>
