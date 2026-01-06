<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisis = Divisi::all();
        return view('admin.divisi.index', compact('divisis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.divisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required|unique:divisis,nama_divisi'
        ]);

        Divisi::create([
            'nama_divisi' => $request->nama_divisi,
            'color' => Divisi::generateRandomColor()
        ]);

        return redirect()->route('divisi.index')
            ->with('success', 'Divisi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divisi $divisi)
    {
        return view('admin.divisi.edit', compact('divisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divisi $divisi)
    {
        $request->validate([
            'nama_divisi' => 'required|unique:divisis,nama_divisi,' . $divisi->id
        ]);

        $divisi->update([
            'nama_divisi' => $request->nama_divisi
        ]);

        return redirect()->route('divisi.index')
            ->with('success', 'Divisi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        return back()->with('success', 'Divisi berhasil dihapus');
    }
}
