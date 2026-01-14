@extends('layouts.app')

@section('content')
<div class="p-5 mb-4 rounded-3 text-white shadow" style="background: linear-gradient(120deg, #1e5631, #4c9f70);">
    <h1 class="display-5 fw-bold">Selamat Datang!</h1>
    <p class="fs-4">Sistem Informasi Desa & Keuangan Warga Sidomulyo.</p>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted text-uppercase fw-bold mb-1">Saldo Kas Saat Ini</h6>
                    <h2 class="text-success fw-bold">Rp {{ isset($saldo) ? number_format($saldo,0,',','.') : '...' }}</h2>
                </div>
                <div class="bg-success bg-opacity-10 p-3 rounded-circle text-success">
                    <i class="bi bi-wallet2 fs-2"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted text-uppercase fw-bold mb-1">Total Warga</h6>
                    <h2 class="text-primary fw-bold">{{ $total_warga ?? '...' }} Orang</h2>
                </div>
                <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                    <i class="bi bi-people-fill fs-2"></i>
                </div>
            </div>
        </div>
    </div>
</div>

@if(isset($transaksi))
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold text-success"><i class="bi bi-clock-history me-2"></i>Riwayat Transaksi Terakhir</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jenis</th>
                        <th class="text-end pe-4">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $t)
                    <tr>
                        <td class="ps-4">{{ $t->tanggal }}</td>
                        <td>{{ $t->keterangan }}</td>
                        <td>
                            <span class="badge {{ $t->jenis == 'masuk' ? 'bg-success' : 'bg-danger' }}">
                                {{ strtoupper($t->jenis) }}
                            </span>
                        </td>
                        <td class="text-end pe-4 fw-bold {{ $t->jenis == 'masuk' ? 'text-success' : 'text-danger' }}">
                            Rp {{ number_format($t->jumlah, 0, ',', '.') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@else
<div class="alert alert-warning">
    <i class="bi bi-info-circle me-2"></i> Data belum terhubung dari Controller. Silakan cek file DashboardController.
</div>
@endif

@endsection