<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $template['title'] }}</title>
    <style>
        @page {
            margin: 25mm 25mm 25mm 25mm;
            @bottom-right {
                content: "Halaman " counter(page);
                font-size: 9pt;
                color: #666;
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', 'Times New Roman', serif;
            font-size: 12pt;
            color: #000;
            line-height: 1.6;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 3px solid #000;
        }

        .header-title {
            font-size: 16pt;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 3px;
        }

        .nomor-surat {
            margin: 20px 0;
            text-align: center;
            font-size: 11pt;
        }

        /* Divider */
        .divider {
            border-top: 1px solid #000;
            margin: 20px 0;
        }

        /* Paragraphs */
        .paragraph {
            text-align: justify;
            margin-bottom: 15px;
            text-indent: 50px;
        }

        .paragraph-no-indent {
            text-align: justify;
            margin-bottom: 15px;
        }

        /* Table */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .info-table td {
            padding: 8px 0;
            vertical-align: top;
        }

        .info-table td.label {
            width: 180px;
            padding-right: 10px;
        }

        .info-table td.separator {
            width: 20px;
            text-align: center;
        }

        .info-table td.value {
            font-weight: 600;
        }

        /* Keterangan Box */
        .keterangan-box {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #000;
            min-height: 100px;
        }

        .keterangan-title {
            font-weight: 700;
            margin-bottom: 10px;
            text-decoration: underline;
        }

        .keterangan-content {
            text-align: justify;
            line-height: 1.8;
        }

        /* Signature */
        .signature-wrapper {
            margin-top: 40px;
        }

        .signature-box {
            float: right;
            width: 250px;
            text-align: center;
        }

        .signature-place {
            text-align: right;
            margin-bottom: 5px;
        }

        .signature-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .signature-space {
            height: 70px;
        }

        .signature-name {
            font-weight: 700;
            text-decoration: underline;
        }

        /* Utilities */
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .text-justify { text-align: justify; }
        .font-bold { font-weight: 700; }
        .mb-10 { margin-bottom: 10px; }
        .mb-15 { margin-bottom: 15px; }
        .mb-20 { margin-bottom: 20px; }
        .mt-20 { margin-top: 20px; }
        .mt-30 { margin-top: 30px; }
        .mt-40 { margin-top: 40px; }

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

    <div class="divider"></div>

    <!-- Pembukaan -->
    <p class="paragraph-no-indent mb-20">
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
    <div class="keterangan-box">
        <div class="keterangan-title">KETERANGAN:</div>
        <div class="keterangan-content">
            @if($keterangan !== '')
                {{ $keterangan }}
            @else
                Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.
            @endif
        </div>
    </div>

    <!-- Penutup -->
    <p class="paragraph mt-20">
        Demikian surat keterangan ini kami buat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana mestinya.
    </p>

    <!-- Signature -->
    <div class="signature-wrapper clearfix">
        <div class="signature-box">
            <div class="signature-place">{{ $tanggal }}</div>
            <div class="signature-title">{{ $penandatangan_jabatan !== '' ? $penandatangan_jabatan : 'Penandatangan' }}</div>
            <div class="signature-space"></div>
            <div class="signature-name">{{ $penandatangan_nama !== '' ? $penandatangan_nama : '( ........................... )' }}</div>
        </div>
    </div>
</body>
</html>
