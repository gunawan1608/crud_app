<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $template['title'] }}</title>
    <style>
        @page { margin: 30px 40px; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #111827; }
        .center { text-align: center; }
        .right { text-align: right; }
        .bold { font-weight: 700; }
        .mt-16 { margin-top: 16px; }
        .mt-24 { margin-top: 24px; }
        .mt-32 { margin-top: 32px; }
        .underline { text-decoration: underline; }
        .content { line-height: 1.6; text-align: justify; }
        table.meta { width: 100%; border-collapse: collapse; margin-top: 14px; }
        table.meta td { padding: 3px 0; vertical-align: top; }
        .label { width: 160px; }
    </style>
</head>
<body>
    <div class="center">
        <div class="bold" style="font-size: 16px;">{{ strtoupper($template['title']) }}</div>
        <div class="mt-16">Nomor: {{ $nomor_surat }}</div>
    </div>

    <div class="mt-24 content">
        Yang bertanda tangan di bawah ini menerangkan bahwa:
    </div>

    <table class="meta">
        <tr>
            <td class="label">Nama</td>
            <td>: {{ $nama }}</td>
        </tr>
        <tr>
            <td class="label">Jabatan</td>
            <td>: {{ $jabatan !== '' ? $jabatan : '-' }}</td>
        </tr>
        <tr>
            <td class="label">Divisi</td>
            <td>: {{ $divisi }}</td>
        </tr>
    </table>

    <div class="mt-24 content">
        Adapun keterangan yang diberikan adalah sebagai berikut:
        <div class="mt-16">
            {{ $keterangan !== '' ? $keterangan : 'Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.' }}
        </div>
    </div>

    <div class="mt-32 right">
        {{ $tanggal }}
    </div>

    <div class="mt-32 right">
        <div>{{ $penandatangan_jabatan !== '' ? $penandatangan_jabatan : 'Penandatangan' }}</div>
        <div style="height: 70px;"></div>
        <div class="bold underline">{{ $penandatangan_nama !== '' ? $penandatangan_nama : '-' }}</div>
    </div>
</body>
</html>
