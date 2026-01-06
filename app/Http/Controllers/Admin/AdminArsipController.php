<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arsip;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Arsip::with(['user', 'divisi'])->latest();

        // Filter by divisi if selected
        if ($request->filled('divisi_id')) {
            $query->where('divisi_id', $request->divisi_id);
        }

        // Search by judul or nomor arsip
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('nomor_arsip', 'like', "%{$search}%");
            });
        }

        $arsips = $query->paginate(15);
        $divisis = Divisi::all();

        return view('admin.arsip.index', compact('arsips', 'divisis'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Arsip $arsip)
    {
        $arsip->load(['user', 'divisi']);
        return view('admin.arsip.show', compact('arsip'));
    }

    /**
     * Download arsip file
     */
    public function download(Arsip $arsip)
    {
        if (!Storage::disk('public')->exists($arsip->file_path)) {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }

        return Storage::download('public/' . $arsip->file_path, $arsip->file_name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arsip $arsip)
    {
        // Hapus file
        if (Storage::disk('public')->exists($arsip->file_path)) {
            Storage::disk('public')->delete($arsip->file_path);
        }

        $arsip->delete();

        return redirect()->route('admin.arsip.index')
            ->with('success', 'Arsip berhasil dihapus');
    }
}
