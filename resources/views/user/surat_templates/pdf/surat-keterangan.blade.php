<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>{{ $template['title'] }}</title>
    <style>
    @page {
        margin: 2cm 2.5cm 2cm 2.5cm;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Times New Roman', Times, serif;
        font-size: 12pt;
        color: #000;
        line-height: 1.7;
    }

    /* Header */
    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header-title {
        font-size: 14pt;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        text-decoration: underline;
    }

    .nomor-surat {
        margin: 15px 0 20px 0;
        text-align: center;
        font-size: 12pt;
    }

    /* Paragraphs */
    .paragraph {
        text-align: justify;
        margin-bottom: 15px;
        line-height: 1.7;
        text-indent: 30px;
    }

    /* Table */
    .info-table {
        width: 100%;
        border-collapse: collapse;
        margin: 15px 0 20px 30px;
    }

    .info-table td {
        padding: 3px 0;
        vertical-align: top;
        font-size: 12pt;
    }

    .info-table td.label {
        width: 120px;
        padding-left: 0;
    }

    .info-table td.separator {
        width: 20px;
        text-align: center;
    }

    .info-table td.value {
        /* auto width */
    }

    /* Keterangan Section */
    .keterangan-section {
        margin: 20px 0;
    }

    .keterangan-title {
        font-weight: 700;
        margin-bottom: 10px;
        font-size: 12pt;
        text-decoration: underline;
        margin-left: 30px;
    }

    .keterangan-content {
        text-align: justify;
        line-height: 1.7;
        font-size: 12pt;
        margin-left: 30px;
        margin-right: 0;
    }

    /* Signature */
    .signature-wrapper {
        margin-top: 30px;
    }

    .signature-box {
        float: right;
        width: 220px;
        text-align: center;
        margin-right: 0;
    }

    .signature-place {
        text-align: right;
        margin-bottom: 5px;
        font-size: 12pt;
    }

    .signature-title {
        font-weight: 400;
        margin-bottom: 5px;
        font-size: 12pt;
    }

    .signature-space {
        height: 60px;
    }

    .signature-name {
        font-weight: 700;
        text-decoration: underline;
        font-size: 12pt;
    }

    .clearfix::after {
        content: "";
        display: table;
        clear: both;
    }
</style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-title">Surat Keterangan</div>
    </div>

    <!-- Nomor Surat -->
    <div class="nomor-surat">
        Nomor: <strong>{{ $nomor_surat }}</strong>
    </div>

    <!-- Pembukaan -->
    <p class="paragraph">
        Yang bertanda tangan di bawah ini menerangkan dengan sebenarnya bahwa:
    </p>

    <!-- Data Identitas -->
    <table class="info-table">
        <tr>
            <td class="label">Nama</td>
            <td class="separator">:</td>
            <td class="value">{{ $nama }}</td>
        </tr>
        <tr>
            <td class="label">Jabatan</td>
            <td class="separator">:</td>
            <td class="value">{{ $jabatan !== '' ? $jabatan : '-' }}</td>
        </tr>
        <tr>
            <td class="label">Divisi</td>
            <td class="separator">:</td>
            <td class="value">{{ $divisi }}</td>
        </tr>
    </table>

    <!-- Keterangan -->
    <div class="keterangan-section">
        <div class="keterangan-title">KETERANGAN:</div>
        <div class="keterangan-content">
            @if($keterangan !== '')
                {{ $keterangan }}
            @else
                Dengan hormat, Bersama surat ini, kami bermaksud memberitahukan bahwa akan diadakan kegiatan [nama kegiatan] yang akan dilaksanakan pada: Hari/Tanggal: [contoh: Senin, 20 Januari 2026] Waktu: [contoh: Pukul 08.00 – 11.00 WIB] Tempat: [contoh: Aula SMK Negeri 1 Jakarta] Sehubungan dengan hal tersebut, kami mengharapkan kehadiran Bapak/Ibu/Saudara/i tepat pada waktu yang telah ditentukan demi kelancaran kegiatan ini. Demikian surat pemberitahuan ini kami sampaikan. Atas perhatian dan kerja samanya, kami ucapkan terima kasih.
            @endif
        </div>
    </div>

    <!-- Penutup -->
    <p class="paragraph">
        Demikian surat keterangan ini kami buat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana mestinya.
    </p>

    <!-- Signature -->
    <div class="signature-wrapper clearfix">
        <div class="signature-box">
            <div class="signature-place">{{ $tanggal }}</div>
            <div class="signature-title">{{ $penandatangan_jabatan !== '' ? $penandatangan_jabatan : 'Manager' }}</div>
            <div class="signature-space"></div>
            <div class="signature-name">{{ $penandatangan_nama !== '' ? $penandatangan_nama : 'Fahri Gani' }}</div>
        </div>
    </div>
</body>
</html>
