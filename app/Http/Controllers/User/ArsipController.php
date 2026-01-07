<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArsipController extends Controller
{
    public function index()
    {
        $arsips = Arsip::where('divisi_id', auth()->user()->divisi_id)
            ->latest()
            ->paginate(10);

        return view('user.arsip.index', compact('arsips'));
    }

    public function create()
    {
        return view('user.arsip.create');
    }

public function store(Request $request)
{
    $user = auth()->user();

    if (!$user->divisi_id) {
        return redirect()->back()->with('error', 'Anda belum terdaftar dalam divisi manapun.');
    }

    // FIX: Validasi dengan ukuran lebih besar
    $request->validate([
        'nomor_arsip' => 'required|unique:arsips,nomor_arsip',
        'judul' => 'required|max:255',
        'keterangan' => 'nullable',
        'kategori' => 'required|in:Surat Masuk,Surat Keluar,Laporan,Notulen,Proposal,Lainnya',
        'tanggal_arsip' => 'required|date',
        // FIX: Tingkatkan max size ke 10MB (10240 KB)
        'file' => 'required|file|mimes:pdf,docx,xlsx|max:10240',
    ], [
        'file.mimes' => 'File harus berformat PDF, DOCX, atau XLSX.',
        'file.max' => 'Ukuran file tidak boleh lebih dari 10MB.',
    ]);

    // Upload file
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

        // FIX: Pastikan direktori ada
        if (!Storage::disk('public')->exists('arsip')) {
            Storage::disk('public')->makeDirectory('arsip');
        }

        $filePath = $file->storeAs('arsip', $fileName, 'public');

        Arsip::create([
            'nomor_arsip' => $request->nomor_arsip,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal_arsip' => $request->tanggal_arsip,
            'file_path' => $filePath,
            'file_name' => $file->getClientOriginalName(),
            'file_type' => $file->getClientOriginalExtension(),
            'file_size' => $file->getSize(),
            'divisi_id' => $user->divisi_id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('arsip.index')
            ->with('success', 'Arsip berhasil ditambahkan');
    }

    return redirect()->back()->with('error', 'Gagal mengupload file');
}


    public function show(Arsip $arsip)
    {
        // Check if user has access to this arsip
        if ($arsip->divisi_id !== auth()->user()->divisi_id) {
            abort(403, 'Anda tidak memiliki akses ke arsip ini.');
        }

        return view('user.arsip.show', compact('arsip'));
    }

    public function edit(Arsip $arsip)
    {
        // Check if user has access to this arsip
        if ($arsip->divisi_id !== auth()->user()->divisi_id) {
            abort(403, 'Anda tidak memiliki akses ke arsip ini.');
        }

        return view('user.arsip.edit', compact('arsip'));
    }

    public function update(Request $request, Arsip $arsip)
    {
        // Check if user has access to this arsip
        if ($arsip->divisi_id !== auth()->user()->divisi_id) {
            abort(403, 'Anda tidak memiliki akses ke arsip ini.');
        }

        $validated = $request->validate([
            'nomor_arsip' => 'required|string|unique:arsips,nomor_arsip,' . $arsip->id,
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'keterangan' => 'nullable|string',
            'tanggal_arsip' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,xlsx,docx|max:5120', // 5MB
        ]);

        try {
            $data = [
                'nomor_arsip' => $validated['nomor_arsip'],
                'judul' => $validated['judul'],
                'kategori' => $validated['kategori'],
                'keterangan' => $validated['keterangan'],
                'tanggal_arsip' => $validated['tanggal_arsip'],
            ];

            // Handle file upload if new file is provided
            if ($request->hasFile('file')) {
                // Delete old file
                if ($arsip->file_path && Storage::exists('public/' . $arsip->file_path)) {
                    Storage::delete('public/' . $arsip->file_path);
                }

                $file = $request->file('file');

                // Generate unique filename
                $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

                // Store file
                $filePath = $file->storeAs('arsip', $fileName, 'public');

                // Get file info
                $fileSize = $file->getSize(); // in bytes
                $fileType = $file->getClientOriginalExtension();
                $originalName = $file->getClientOriginalName();

                $data['file_path'] = $filePath;
                $data['file_name'] = $originalName;
                $data['file_type'] = $fileType;
                $data['file_size'] = $fileSize; // Save file size in bytes
            }

            $arsip->update($data);

            return redirect()->route('arsip.index')->with('success', 'Arsip berhasil diperbarui!');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Arsip $arsip)
    {
        // Check if user has access to this arsip
        if ($arsip->divisi_id !== auth()->user()->divisi_id) {
            abort(403, 'Anda tidak memiliki akses ke arsip ini.');
        }

        try {
            // Delete file from storage
            if ($arsip->file_path && Storage::exists('public/' . $arsip->file_path)) {
                Storage::delete('public/' . $arsip->file_path);
            }

            $arsip->delete();

            return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dihapus!');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function download(Arsip $arsip)
    {
        // Check if user has access to this arsip
        if ($arsip->divisi_id !== auth()->user()->divisi_id) {
            abort(403, 'Anda tidak memiliki akses ke arsip ini.');
        }

        $filePath = storage_path('app/public/' . $arsip->file_path);

        if (!file_exists($filePath)) {
            return back()->with('error', 'File tidak ditemukan!');
        }

        return response()->download($filePath, $arsip->file_name);
    }
}
