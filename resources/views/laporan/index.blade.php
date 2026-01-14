@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-success mb-1">Pusat Laporan</h4>
        <p class="text-muted mb-0">Cetak laporan keuangan dan data kependudukan desa.</p>
    </div>
</div>

<div class="card border-0 shadow-sm mb-5">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold text-success"><i class="bi bi-wallet2 me-2"></i>Laporan Keuangan Desa</h6>
        
        <a href="{{ route('laporan.cetak') }}" target="_blank" class="btn btn-success btn-sm text-white shadow-sm">
            <i class="bi bi-printer-fill me-2"></i>Cetak Keuangan
        </a>
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
                    @forelse($transaksi as $t)
                    <tr>
                        <td class="ps-4">{{ \Carbon\Carbon::parse($t->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $t->keterangan }}</td>
                        <td>
                            <span class="badge {{ $t->jenis == 'masuk' ? 'bg-success' : 'bg-danger' }}">
                                {{ strtoupper($t->jenis) }}
                            </span>
                        </td>
                        <td class="text-end pe-4 fw-bold">Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">Belum ada data transaksi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <h5 class="fw-bold text-secondary"><i class="bi bi-archive-fill me-2"></i>Arsip & Laporan Lainnya</h5>
    </div>

    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center p-4">
                <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3 text-primary">
                    <i class="bi bi-people-fill fs-3"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1 text-dark">Data Penduduk Desa</h6>
                    <p class="text-muted small mb-3">Unduh dan cetak laporan lengkap seluruh data warga desa.</p>
                    
                    <a href="{{ route('warga.cetak') }}" target="_blank" class="btn btn-outline-primary btn-sm fw-bold">
                        <i class="bi bi-printer me-2"></i>Cetak Data Warga
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100" style="background-color: #f8f9fa; border-style: dashed !important;">
            <div class="card-body d-flex justify-content-center align-items-center text-muted">
                <small><i>Laporan lainnya akan ditambahkan disini...</i></small>
            </div>
        </div>
    </div>
</div>

<br><br> @endsection