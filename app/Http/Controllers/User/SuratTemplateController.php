<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SuratTemplateController extends Controller
{
    private function normalizePdfFilename(string $requested, string $fallback): string
    {
        $name = trim($requested);

        if ($name === '') {
            $name = $fallback;
        }

        $name = basename($name);

        if (!str_ends_with(strtolower($name), '.pdf')) {
            $name .= '.pdf';
        }

        return $name;
    }

    private function templates(): array
    {
        return [
            'surat-keterangan' => [
                'key' => 'surat-keterangan',
                'title' => 'Surat Keterangan',
                'description' => 'Template surat keterangan umum (dinamis dari data user).',
                'view' => 'user.surat_templates.pdf.surat-keterangan',
                'paper' => ['A4', 'portrait'],
                'filename' => 'surat-keterangan.pdf',
            ],
            'surat-tugas' => [
                'key' => 'surat-tugas',
                'title' => 'Surat Tugas',
                'description' => 'Template surat tugas (dinamis dari data user).',
                'view' => 'user.surat_templates.pdf.surat-tugas',
                'paper' => ['A4', 'portrait'],
                'filename' => 'surat-tugas.pdf',
            ],
        ];
    }

    public function index()
    {
        $templates = array_values($this->templates());

        return view('user.surat_templates.index', compact('templates'));
    }

    public function download(Request $request, string $template)
    {
        $templates = $this->templates();

        if (!isset($templates[$template])) {
            abort(404);
        }

        $meta = $templates[$template];

        $user = auth()->user();
        $divisiNama = optional($user->divisi)->nama_divisi;

        $tanggal = Carbon::now()->translatedFormat('d F Y');

        $data = [
            'template' => $meta,
            'tanggal' => (string) $request->query('tanggal', $tanggal),
            'nomor_surat' => (string) $request->query('nomor_surat', '-'),
            'nama' => (string) $request->query('nama', $user->name),
            'jabatan' => (string) $request->query('jabatan', ''),
            'divisi' => (string) $request->query('divisi', $divisiNama ?: '-'),
            'keterangan' => (string) $request->query('keterangan', ''),
            'tujuan' => (string) $request->query('tujuan', ''),
            'lokasi' => (string) $request->query('lokasi', ''),
            'tanggal_mulai' => (string) $request->query('tanggal_mulai', ''),
            'tanggal_selesai' => (string) $request->query('tanggal_selesai', ''),
            'penandatangan_nama' => (string) $request->query('penandatangan_nama', ''),
            'penandatangan_jabatan' => (string) $request->query('penandatangan_jabatan', ''),
        ];

        $pdf = Pdf::loadView($meta['view'], $data)
            ->setPaper($meta['paper'][0], $meta['paper'][1]);

        $fileName = $this->normalizePdfFilename((string) $request->query('filename', ''), $meta['filename']);

        return $pdf->download($fileName);
    }

    public function view(Request $request, string $template)
    {
        $templates = $this->templates();

        if (!isset($templates[$template])) {
            abort(404);
        }

        $meta = $templates[$template];

        $user = auth()->user();
        $divisiNama = optional($user->divisi)->nama_divisi;

        $tanggal = Carbon::now()->translatedFormat('d F Y');

        $data = [
            'template' => $meta,
            'tanggal' => (string) $request->query('tanggal', $tanggal),
            'nomor_surat' => (string) $request->query('nomor_surat', '-'),
            'nama' => (string) $request->query('nama', $user->name),
            'jabatan' => (string) $request->query('jabatan', ''),
            'divisi' => (string) $request->query('divisi', $divisiNama ?: '-'),
            'keterangan' => (string) $request->query('keterangan', ''),
            'tujuan' => (string) $request->query('tujuan', ''),
            'lokasi' => (string) $request->query('lokasi', ''),
            'tanggal_mulai' => (string) $request->query('tanggal_mulai', ''),
            'tanggal_selesai' => (string) $request->query('tanggal_selesai', ''),
            'penandatangan_nama' => (string) $request->query('penandatangan_nama', ''),
            'penandatangan_jabatan' => (string) $request->query('penandatangan_jabatan', ''),
        ];

        $pdf = Pdf::loadView($meta['view'], $data)
            ->setPaper($meta['paper'][0], $meta['paper'][1]);

        $fileName = $this->normalizePdfFilename((string) $request->query('filename', ''), $meta['filename']);

        return $pdf->stream($fileName);
    }
}
