<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>{{ $template['title'] }}</title>
    <style>
        @page {
            margin: 2.5cm 3cm 2.5cm 3cm;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            color: #000;
            line-height: 1.6;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header-title {
            font-size: 13pt;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-decoration: underline;
        }

        .nomor-surat {
            margin: 20px 0;
            text-align: center;
            font-size: 11pt;
        }

        /* Paragraphs */
        .paragraph {
            text-align: justify;
            margin-bottom: 12px;
            line-height: 1.6;
        }

        /* Table */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 18px 0;
        }

        .info-table td {
            padding: 2px 0;
            vertical-align: top;
            font-size: 11pt;
        }

        .info-table td.label {
            width: 100px;
            padding-left: 0;
        }

        .info-table td.separator {
            width: 15px;
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
            margin-bottom: 8px;
            font-size: 11pt;
            text-decoration: underline;
        }

        .keterangan-content {
            text-align: justify;
            line-height: 1.6;
            font-size: 11pt;
            margin-left: 0;
        }

        /* Signature */
        .signature-wrapper {
            margin-top: 35px;
        }

        .signature-box {
            float: right;
            width: 200px;
            text-align: center;
        }

        .signature-place {
            text-align: right;
            margin-bottom: 5px;
            font-size: 11pt;
        }

        .signature-title {
            font-weight: 400;
            margin-bottom: 5px;
            font-size: 11pt;
        }

        .signature-space {
            height: 65px;
        }

        .signature-name {
            font-weight: 700;
            text-decoration: underline;
            font-size: 11pt;
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
