<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arsip;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminArsipController extends Controller
{
    public function index(Request $request)
    {
        $query = Arsip::with(['divisi', 'user']);

        // Filter berdasarkan search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('nomor_arsip', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan divisi
        if ($request->filled('divisi_id')) {
            $query->where('divisi_id', $request->divisi_id);
        }

        $arsips = $query->latest()->paginate(15);
        $divisis = Divisi::all();

        return view('admin.arsip.index', compact('arsips', 'divisis'));
    }

    public function show(Arsip $arsip)
    {
        $arsip->load(['divisi', 'user']);
        return view('admin.arsip.show', compact('arsip'));
    }

    public function destroy(Arsip $arsip)
    {
        try {
            // Delete file from storage
            if ($arsip->file_path && Storage::exists('public/' . $arsip->file_path)) {
                Storage::delete('public/' . $arsip->file_path);
            }

            $arsip->delete();

            return redirect()->route('admin.arsip.index')->with('success', 'Arsip berhasil dihapus!');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function download(Arsip $arsip)
    {
        $filePath = storage_path('app/public/' . $arsip->file_path);

        if (!file_exists($filePath)) {
            return back()->with('error', 'File tidak ditemukan!');
        }

        return response()->download($filePath, $arsip->file_name);
    }
}
