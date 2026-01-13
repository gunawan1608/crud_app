<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Template Surat
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    Download surat siap pakai (PDF) dengan data dinamis
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($templates as $template)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $template['title'] }}</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $template['description'] }}</p>
                            </div>
                        </div>

                        <form method="GET" action="{{ route('surat-templates.download', $template['key']) }}" class="mt-5 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Nomor Surat</label>
                                    <input name="nomor_surat" type="text" class="w-full rounded border-gray-300" placeholder="-" />
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Tanggal</label>
                                    <input name="tanggal" type="date" class="w-full rounded border-gray-300" placeholder="{{ now()->translatedFormat('d F Y') }}" />
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Nama</label>
                                    <input name="nama" type="text" class="w-full rounded border-gray-300" placeholder="{{ auth()->user()->name }}" />
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Jabatan</label>
                                    <input name="jabatan" type="text" class="w-full rounded border-gray-300" placeholder="(opsional)" />
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Divisi</label>
                                    <input name="divisi" type="text" class="w-full rounded border-gray-300" placeholder="{{ auth()->user()->divisi->nama_divisi ?? '-' }}" />
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Nama Penandatangan</label>
                                    <input name="penandatangan_nama" type="text" class="w-full rounded border-gray-300" placeholder="(opsional)" />
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Jabatan Penandatangan</label>
                                    <input name="penandatangan_jabatan" type="text" class="w-full rounded border-gray-300" placeholder="(opsional)" />
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Nama File</label>
                                    <input name="filename" type="text" class="w-full rounded border-gray-300" placeholder="{{ $template['filename'] }}" />
                                </div>
                            </div>

                            @if($template['key'] === 'surat-keterangan')
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">Keterangan</label>
                                    <textarea name="keterangan" rows="3" class="w-full rounded border-gray-300" placeholder="Isi keterangan surat (opsional)"></textarea>
                                </div>
                            @endif

                            @if($template['key'] === 'surat-tugas')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm text-gray-700 mb-1">Tujuan</label>
                                        <input name="tujuan" type="text" class="w-full rounded border-gray-300" placeholder="(opsional)" />
                                    </div>
                                    <div>
                                        <label class="block text-sm text-gray-700 mb-1">Lokasi</label>
                                        <input name="lokasi" type="text" class="w-full rounded border-gray-300" placeholder="(opsional)" />
                                    </div>
                                    <div>
                                        <label class="block text-sm text-gray-700 mb-1">Tanggal Mulai</label>
                                        <input name="tanggal_mulai" type="text" class="w-full rounded border-gray-300" placeholder="(opsional)" />
                                    </div>
                                    <div>
                                        <label class="block text-sm text-gray-700 mb-1">Tanggal Selesai</label>
                                        <input name="tanggal_selesai" type="text" class="w-full rounded border-gray-300" placeholder="(opsional)" />
                                    </div>
                                </div>
                            @endif

                            <div class="pt-2 flex items-center gap-2">
                                <button type="submit"
                                        formaction="{{ route('surat-templates.view', $template['key']) }}"
                                        formtarget="_blank"
                                        class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-800">
                                    Lihat PDF
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
