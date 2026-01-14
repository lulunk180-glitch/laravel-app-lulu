<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Penduduk</title>
    <style>
        body { font-family: 'Times New Roman', serif; padding: 30px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h3 { margin: 0; font-weight: bold; text-transform: uppercase; }
        .header h2 { margin: 5px 0; font-weight: bold; text-transform: uppercase; }
        .header small { font-size: 12px; font-style: italic; }
        .line { border-bottom: 3px double black; margin-top: 10px; margin-bottom: 20px; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 6px; font-size: 12px; }
        th { background-color: #f2f2f2; text-align: center; }
        
        .ttd-area { display: flex; justify-content: flex-end; margin-top: 50px; }
        .ttd-box { width: 250px; text-align: center; }
        .ttd-space { height: 70px; }
    </style>
</head>
<body onload="window.print()">

   <div class="header">
    <div style="position: relative; width: 100%; margin-bottom: 20px; margin-top: 20px;">

        <div style="position: absolute; left: 55px; top: 0;">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="width: 80px; height: auto;">
        </div>

        <div style="text-align: center; width: 100%; padding-left: 55px;">
            <h3 style="margin: 0; font-size: 20px; font-weight: bold; text-transform: uppercase;">PEMERINTAH KABUPATEN SIMALUNGUN</h3>
            <h3 style="margin: 0; font-size: 20px; font-weight: bold; text-transform: uppercase;">KECAMATAN TANAH JAWA</h3>
            <h2 style="margin: 5px 0; font-size: 24px; font-weight: bold; text-transform: uppercase;">DESA SIDOMULYO 1 BALIMBINGAN</h2>
            <small style="font-size: 14px; font-style: italic;">Sidomulyo 1 Balimbingan, Kecamatan Tanah Jawa, Kode Pos 12345</small>
        </div>

    </div>

    <hr style="border: 0; border-bottom: 4px double black; margin-top: 20px; margin-bottom: 30px;">
</div>

    <center>
        <h3>DATA PENDUDUK DESA</h3>
        <p>Per Tanggal: {{ date('d F Y') }}</p>
    </center>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($warga as $w)
            <tr>
                <td style="text-align: center">{{ $no++ }}</td>
                <td>{{ $w->nik ?? '-' }}</td>
                <td>{{ $w->nama ?? $w->nama_lengkap ?? $w->name ?? 'Nama Tidak Terbaca' }}</td>
                <td>{{ $w->alamat ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ttd-area">
        <div class="ttd-box">
            <p>Sidomulyo 1 Balimbingan, {{ date('d F Y') }}</p>
            <p>Pangulu / Kepala Desa,</p>
            <div class="ttd-space"></div>
            <p><strong>( .................................... )</strong></p>
        </div>
    </div>

</body>
</html>