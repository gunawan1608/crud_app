<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use TCPDF;

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
                'filename' => 'surat-keterangan.pdf',
            ],
            'surat-tugas' => [
                'key' => 'surat-tugas',
                'title' => 'Surat Tugas',
                'description' => 'Template surat tugas (dinamis dari data user).',
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
            'penandatangan_nama' => (string) $request->query('penandatangan_nama', 'Fahri Gani'),
            'penandatangan_jabatan' => (string) $request->query('penandatangan_jabatan', 'Manajer'),
        ];

        $fileName = $this->normalizePdfFilename((string) $request->query('filename', ''), $meta['filename']);

        if ($template === 'surat-keterangan') {
            $pdf = $this->generateSuratKeterangan($data);
        } elseif ($template === 'surat-tugas') {
            $pdf = $this->generateSuratTugas($data);
        } else {
            abort(404);
        }

        return response()->streamDownload(function() use ($pdf, $fileName) {
            $pdf->Output($fileName, 'D');
        }, $fileName);
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
            'penandatangan_nama' => (string) $request->query('penandatangan_nama', 'Fahri Gani'),
            'penandatangan_jabatan' => (string) $request->query('penandatangan_jabatan', 'Manajer'),
        ];

        $fileName = $this->normalizePdfFilename((string) $request->query('filename', ''), $meta['filename']);

        if ($template === 'surat-keterangan') {
            $pdf = $this->generateSuratKeterangan($data);
        } elseif ($template === 'surat-tugas') {
            $pdf = $this->generateSuratTugas($data);
        } else {
            abort(404);
        }

        return response()->streamDownload(function() use ($pdf, $fileName) {
            $pdf->Output($fileName, 'I');
        }, $fileName);
    }

    private function generateSuratKeterangan(array $data): TCPDF
    {
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        $pdf->SetCreator('Laravel TCPDF');
        $pdf->SetAuthor('System');
        $pdf->SetTitle('Surat Keterangan');
        $pdf->SetSubject('Surat Keterangan');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->SetMargins(40, 40, 30);
        $pdf->SetAutoPageBreak(true, 30);

        $pdf->AddPage();

        // Jarak dari margin atas ke judul
        $pdf->Ln(12);

        // JUDUL SURAT
        $pdf->SetFont('times', 'B', 14);
        $pdf->Cell(0, 8, 'SURAT KETERANGAN', 0, 1, 'C');

        // Jarak judul ke nomor surat
        $pdf->Ln(5);

        // NOMOR SURAT
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(0, 6, 'Nomor: ' . $data['nomor_surat'], 0, 1, 'C');

        // Jarak nomor ke paragraf pembuka
        $pdf->Ln(8);

        // PARAGRAF PEMBUKA (rata kiri tanpa spasi manual)
        $pdf->SetFont('times', '', 12);
        $pembuka = 'Yang bertanda tangan di bawah ini menerangkan dengan sebenarnya bahwa:';
        $pdf->MultiCell(0, 6, $pembuka, 0, 'L', false, 1);

        // Jarak ke blok data
        $pdf->Ln(6);

        // BLOK DATA IDENTITAS
        $labelWidth = 35;
        $separatorWidth = 5;
        $rowHeight = 6;

        $pdf->Cell($labelWidth, $rowHeight, 'Nama', 0, 0, 'L');
        $pdf->Cell($separatorWidth, $rowHeight, ':', 0, 0, 'L');
        $pdf->Cell(0, $rowHeight, $data['nama'], 0, 1, 'L');

        $jabatanValue = $data['jabatan'] !== '' ? $data['jabatan'] : '-';
        $pdf->Cell($labelWidth, $rowHeight, 'Jabatan', 0, 0, 'L');
        $pdf->Cell($separatorWidth, $rowHeight, ':', 0, 0, 'L');
        $pdf->Cell(0, $rowHeight, $jabatanValue, 0, 1, 'L');

        $pdf->Cell($labelWidth, $rowHeight, 'Divisi', 0, 0, 'L');
        $pdf->Cell($separatorWidth, $rowHeight, ':', 0, 0, 'L');
        $pdf->Cell(0, $rowHeight, $data['divisi'], 0, 1, 'L');

        // Jarak blok data ke heading keterangan
        $pdf->Ln(8);

        // HEADING KETERANGAN
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(0, 6, 'KETERANGAN:', 0, 1, 'L');

        // Jarak heading ke isi keterangan
        $pdf->Ln(4);

        // ISI KETERANGAN (rata kiri tanpa spasi manual)
        $pdf->SetFont('times', '', 12);
        if ($data['keterangan'] !== '') {
            $keteranganText = $data['keterangan'];
        } else {
            $keteranganText = 'Dengan hormat, bersama surat ini kami bermaksud memberitahukan bahwa akan diadakan kegiatan [nama kegiatan] yang akan dilaksanakan pada Hari/Tanggal: [contoh: Senin, 20 Januari 2026], Waktu: [contoh: Pukul 08.00–11.00 WIB], Tempat: [contoh: Aula SMK Negeri 1 Jakarta]. Sehubungan dengan hal tersebut, kami mengharapkan kehadiran Bapak/Ibu/Saudara/i tepat pada waktu yang telah ditentukan demi kelancaran kegiatan ini. Demikian surat pemberitahuan ini kami sampaikan. Atas perhatian dan kerja samanya, kami ucapkan terima kasih.';
        }
        $pdf->MultiCell(0, 6, $keteranganText, 0, 'L', false, 1);

        // Jarak keterangan ke penutup
        $pdf->Ln(6);

        // PARAGRAF PENUTUP (rata kiri tanpa spasi manual)
        $penutup = 'Demikian surat keterangan ini kami buat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana mestinya.';
        $pdf->MultiCell(0, 6, $penutup, 0, 'L', false, 1);

        // Jarak penutup ke tanda tangan
        $pdf->Ln(25);

        // BLOK TANDA TANGAN (RATA KANAN)
        $margins = $pdf->getMargins();
        $signatureBoxWidth = 50;
        $pageWidth = $pdf->getPageWidth();
        $contentWidth = $pageWidth - $margins['left'] - $margins['right'];
        $signatureX = $margins['left'] + $contentWidth - $signatureBoxWidth;

        $currentY = $pdf->GetY();
        $pdf->SetXY($signatureX, $currentY);

        $pdf->SetFont('times', '', 12);
        $pdf->Cell($signatureBoxWidth, 6, $data['tanggal'], 0, 1, 'L');

        $pdf->SetX($signatureX);
        $pdf->Cell($signatureBoxWidth, 6, $data['penandatangan_jabatan'], 0, 1, 'L');

        // Ruang tanda tangan
        $pdf->Ln(18);

        $pdf->SetX($signatureX);
        $pdf->SetFont('times', 'BU', 12);
        $pdf->Cell($signatureBoxWidth, 6, $data['penandatangan_nama'], 0, 1, 'L');

        return $pdf;
    }

    private function generateSuratTugas(array $data): TCPDF
    {
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        $pdf->SetCreator('Laravel TCPDF');
        $pdf->SetAuthor('System');
        $pdf->SetTitle('Surat Tugas');
        $pdf->SetSubject('Surat Tugas');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Margin 25mm untuk semua sisi
        $pdf->SetMargins(25, 25, 25);
        $pdf->SetAutoPageBreak(true, 25);

        $pdf->AddPage();

        // Jarak dari margin atas ke judul
        $pdf->Ln(12);

        // JUDUL SURAT
        $pdf->SetFont('times', 'B', 14);
        $pdf->Cell(0, 8, 'SURAT TUGAS', 0, 1, 'C');

        // Jarak judul ke nomor surat
        $pdf->Ln(5);

        // NOMOR SURAT
        $pdf->SetFont('times', '', 12);
        $pdf->Cell(0, 6, 'Nomor: ' . $data['nomor_surat'], 0, 1, 'C');

        // Jarak nomor ke paragraf pembuka
        $pdf->Ln(8);

        // PARAGRAF PEMBUKA (rata kiri tanpa spasi manual)
        $pdf->SetFont('times', '', 12);
        $pembuka = 'Dengan ini memberikan tugas kepada:';
        $pdf->MultiCell(0, 6, $pembuka, 0, 'L', false, 1);

        // Jarak ke blok data
        $pdf->Ln(6);

        // BLOK DATA PETUGAS
        $labelWidth = 35;
        $separatorWidth = 5;
        $rowHeight = 6;

        $pdf->Cell($labelWidth, $rowHeight, 'Nama', 0, 0, 'L');
        $pdf->Cell($separatorWidth, $rowHeight, ':', 0, 0, 'L');
        $pdf->Cell(0, $rowHeight, $data['nama'], 0, 1, 'L');

        $jabatanValue = $data['jabatan'] !== '' ? $data['jabatan'] : '-';
        $pdf->Cell($labelWidth, $rowHeight, 'Jabatan', 0, 0, 'L');
        $pdf->Cell($separatorWidth, $rowHeight, ':', 0, 0, 'L');
        $pdf->Cell(0, $rowHeight, $jabatanValue, 0, 1, 'L');

        $pdf->Cell($labelWidth, $rowHeight, 'Divisi', 0, 0, 'L');
        $pdf->Cell($separatorWidth, $rowHeight, ':', 0, 0, 'L');
        $pdf->Cell(0, $rowHeight, $data['divisi'], 0, 1, 'L');

        // Jarak blok data ke heading rincian tugas
        $pdf->Ln(8);

        // HEADING RINCIAN TUGAS
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(0, 6, 'RINCIAN TUGAS:', 0, 1, 'L');

        // Jarak heading ke isi rincian
        $pdf->Ln(4);

        // BLOK RINCIAN TUGAS
        $pdf->SetFont('times', '', 12);
        $taskLabelWidth = 35;

        $tujuanValue = $data['tujuan'] !== '' ? $data['tujuan'] : '-';
        $pdf->Cell($taskLabelWidth, $rowHeight, 'Tujuan Tugas', 0, 0, 'L');
        $pdf->Cell($separatorWidth, $rowHeight, ':', 0, 0, 'L');
        $pdf->MultiCell(0, $rowHeight, $tujuanValue, 0, 'L', false, 1);

        $lokasiValue = $data['lokasi'] !== '' ? $data['lokasi'] : '-';
        $pdf->Cell($taskLabelWidth, $rowHeight, 'Lokasi', 0, 0, 'L');
        $pdf->Cell($separatorWidth, $rowHeight, ':', 0, 0, 'L');
        $pdf->Cell(0, $rowHeight, $lokasiValue, 0, 1, 'L');

        $mulaiValue = $data['tanggal_mulai'] !== '' ? $data['tanggal_mulai'] : '-';
        $selesaiValue = $data['tanggal_selesai'] !== '' ? $data['tanggal_selesai'] : '-';
        $periodeValue = $mulaiValue . ' s.d. ' . $selesaiValue;

        $pdf->Cell($taskLabelWidth, $rowHeight, 'Periode Tugas', 0, 0, 'L');
        $pdf->Cell($separatorWidth, $rowHeight, ':', 0, 0, 'L');
        $pdf->Cell(0, $rowHeight, $periodeValue, 0, 1, 'L');

        // Jarak rincian ke heading catatan
        $pdf->Ln(8);

        // HEADING CATATAN
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(0, 6, 'CATATAN:', 0, 1, 'L');

        // Jarak heading ke isi catatan
        $pdf->Ln(4);

        // ISI CATATAN (rata kiri tanpa spasi manual)
        $pdf->SetFont('times', '', 12);
        $catatan = 'Yang bersangkutan wajib melaksanakan tugas ini dengan penuh tanggung jawab dan melaporkan hasilnya kepada atasan langsung.';
        $pdf->MultiCell(0, 6, $catatan, 0, 'L', false, 1);

        // Jarak catatan ke penutup
        $pdf->Ln(6);

        // PARAGRAF PENUTUP (rata kiri tanpa spasi manual)
        $penutup = 'Demikian surat tugas ini dibuat untuk dilaksanakan dengan sebaik-baiknya dan penuh tanggung jawab.';
        $pdf->MultiCell(0, 6, $penutup, 0, 'L', false, 1);

        // Jarak penutup ke tanda tangan
        $pdf->Ln(25);

        // BLOK TANDA TANGAN (RATA KANAN)
        $margins = $pdf->getMargins();
        $signatureBoxWidth = 60;
        $pageWidth = $pdf->getPageWidth();
        $contentWidth = $pageWidth - $margins['left'] - $margins['right'];
        $signatureX = $margins['left'] + $contentWidth - $signatureBoxWidth;

        $currentY = $pdf->GetY();
        $pdf->SetXY($signatureX, $currentY);

        $pdf->SetFont('times', '', 12);
        $pdf->Cell($signatureBoxWidth, 6, $data['tanggal'], 0, 1, 'L');

        $pdf->SetX($signatureX);
        $pdf->Cell($signatureBoxWidth, 6, $data['penandatangan_jabatan'], 0, 1, 'L');

        // Ruang tanda tangan
        $pdf->Ln(18);

        $pdf->SetX($signatureX);
        $pdf->SetFont('times', 'BU', 12);
        $pdf->Cell($signatureBoxWidth, 6, $data['penandatangan_nama'], 0, 1, 'L');

        return $pdf;
    }
}
