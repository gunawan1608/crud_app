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

        /* Task Box */
        .task-box {
            margin: 25px 0;
            border: 2px solid #000;
            padding: 0;
        }

        .task-header {
            background: #000;
            color: #fff;
            padding: 8px 15px;
            font-weight: 700;
            font-size: 11pt;
            text-transform: uppercase;
        }

        .task-content {
            padding: 15px;
        }

        .task-table {
            width: 100%;
            border-collapse: collapse;
        }

        .task-table td {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            vertical-align: top;
        }

        .task-table tr:last-child td {
            border-bottom: none;
        }

        .task-table td.task-label {
            width: 150px;
            font-weight: 600;
            padding-right: 10px;
        }

        .task-table td.task-separator {
            width: 20px;
            text-align: center;
        }

        .task-table td.task-value {
            /* default styling */
        }

        /* Note Box */
        .note-box {
            margin: 20px 0;
            padding: 12px 15px;
            border: 1px solid #000;
            font-size: 11pt;
        }

        .note-title {
            font-weight: 700;
            margin-bottom: 5px;
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
        <div class="header-title">Surat Tugas</div>
    </div>

    <!-- Nomor Surat -->
    <div class="nomor-surat">
        Nomor: <strong>{{ $nomor_surat }}</strong>
    </div>

    <div class="divider"></div>

    <!-- Pembukaan -->
    <p class="paragraph-no-indent mb-20">
        Dengan ini memberikan tugas kepada:
    </p>

    <!-- Data Petugas -->
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

    <!-- Detail Tugas -->
    <div class="task-box">
        <div class="task-header">Rincian Tugas</div>
        <div class="task-content">
            <table class="task-table">
                <tr>
                    <td class="task-label">Tujuan Tugas</td>
                    <td class="task-separator">:</td>
                    <td class="task-value">{{ $tujuan !== '' ? $tujuan : '-' }}</td>
                </tr>
                <tr>
                    <td class="task-label">Lokasi</td>
                    <td class="task-separator">:</td>
                    <td class="task-value">{{ $lokasi !== '' ? $lokasi : '-' }}</td>
                </tr>
                <tr>
                    <td class="task-label">Periode Tugas</td>
                    <td class="task-separator">:</td>
                    <td class="task-value">
                        {{ $tanggal_mulai !== '' ? $tanggal_mulai : '-' }}
                        s/d
                        {{ $tanggal_selesai !== '' ? $tanggal_selesai : '-' }}
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Note -->
    <div class="note-box">
        <div class="note-title">CATATAN:</div>
        <div>Yang bersangkutan wajib melaksanakan tugas ini dengan penuh tanggung jawab dan melaporkan hasilnya kepada atasan langsung.</div>
    </div>

    <!-- Penutup -->
    <p class="paragraph mt-20">
        Demikian surat tugas ini dibuat untuk dilaksanakan dengan sebaik-baiknya dan penuh tanggung jawab.
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
