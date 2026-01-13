<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Arsip;
use Barryvdh\DomPDF\Facade\Pdf;

class UserSuratController extends Controller
{
    public function viewPdf(Arsip $arsip)
    {
        $user = auth()->user();

        // 🔐 pastikan satu divisi
        if ($arsip->divisi_id !== $user->divisi_id) {
            abort(403);
        }

        $pdf = Pdf::loadView('user.surat.pdf', [
            'surat' => $arsip,
            'user'  => $user
        ])->setPaper('A4', 'portrait');

        return $pdf->stream('surat-'.$arsip->id.'.pdf');
    }
}
    