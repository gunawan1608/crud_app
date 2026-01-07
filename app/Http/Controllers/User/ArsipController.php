<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;


class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        // Pastikan user memiliki divisi
        if (!$user->divisi_id) {
            return redirect()->back()->with('error', 'Anda belum terdaftar dalam divisi manapun. Hubungi administrator.');
        }

        // Ambil arsip hanya dari divisi user
        $arsips = Arsip::where('divisi_id', $user->divisi_id)
            ->with(['user', 'divisi'])
            ->latest()
            ->paginate(10);

        return view('user.arsip.index', compact('arsips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        if (!$user->divisi_id) {
            return redirect()->back()->with('error', 'Anda belum terdaftar dalam divisi manapun.');
        }

        return view('user.arsip.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user->divisi_id) {
            return redirect()->back()->with('error', 'Anda belum terdaftar dalam divisi manapun.');
        }

        $request->validate([
            'nomor_arsip' => 'required|unique:arsips,nomor_arsip,' . ($arsip->id ?? ''),
            'judul' => 'required|max:255',
            'keterangan' => 'nullable',
            'tanggal_arsip' => 'required|date',
            'file' => 'required|file|mimes:pdf,docx,xlsx|max:5120',
        ], [
            'file.mimes' => 'File harus berformat PDF, DOCX, atau XLSX.',
            'file.max' => 'Ukuran file tidak boleh lebih dari 5MB.',
        ]);


        // Upload file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('arsip', $fileName, 'public');

            Arsip::create([
                'nomor_arsip' => $request->nomor_arsip,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
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

    /**
     * Display the specified resource.
     */
    public function show(Arsip $arsip)
    {
        // Cek apakah arsip ini milik divisi user
        if ($arsip->divisi_id !== auth()->user()->divisi_id) {
            abort(403, 'Anda tidak memiliki akses ke arsip ini');
        }

        return view('user.arsip.show', compact('arsip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arsip $arsip)
    {
        // Cek apakah arsip ini milik divisi user
        if ($arsip->divisi_id !== auth()->user()->divisi_id) {
            abort(403, 'Anda tidak memiliki akses ke arsip ini');
        }

        return view('user.arsip.edit', compact('arsip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arsip $arsip)
    {
        // Cek apakah arsip ini milik divisi user
        if ($arsip->divisi_id !== auth()->user()->divisi_id) {
            abort(403, 'Anda tidak memiliki akses ke arsip ini');
        }

        $request->validate([
            'nomor_arsip' => 'required|unique:arsips,nomor_arsip,' . $arsip->id,
            'judul' => 'required|max:255',
            'keterangan' => 'nullable',
            'tanggal_arsip' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
        ]);

        $data = [
            'nomor_arsip' => $request->nomor_arsip,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'tanggal_arsip' => $request->tanggal_arsip,
        ];

        // Jika ada file baru diupload
        if ($request->hasFile('file')) {
            // Hapus file lama
            if (Storage::disk('public')->exists($arsip->file_path)) {
                Storage::disk('public')->delete($arsip->file_path);
            }

            // Upload file baru
            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('arsip', $fileName, 'public');

            $data['file_path'] = $filePath;
            $data['file_name'] = $file->getClientOriginalName();
            $data['file_type'] = $file->getClientOriginalExtension();
            $data['file_size'] = $file->getSize();
        }

        $arsip->update($data);

        return redirect()->route('arsip.index')
            ->with('success', 'Arsip berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arsip $arsip)
    {
        // Cek apakah arsip ini milik divisi user
        if ($arsip->divisi_id !== auth()->user()->divisi_id) {
            abort(403, 'Anda tidak memiliki akses ke arsip ini');
        }

        // Hapus file
        if (Storage::disk('public')->exists($arsip->file_path)) {
            Storage::disk('public')->delete($arsip->file_path);
        }

        $arsip->delete();

        return redirect()->route('arsip.index')
            ->with('success', 'Arsip berhasil dihapus');
    }

    /**
     * Download arsip file
     */
    public function download(Arsip $arsip)
    {
        if ($arsip->divisi_id !== auth()->user()->divisi_id) {
            abort(403, 'Anda tidak memiliki akses ke arsip ini');
        }

        if (!Storage::disk('public')->exists($arsip->file_path)) {
            return back()->with('error', 'File tidak ditemukan');
        }

        return Storage::disk('public')
            ->download($arsip->file_path, $arsip->file_name);
    }
}
