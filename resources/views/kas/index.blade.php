@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold text-success mb-1">Kas Desa</h4>
        <p class="text-muted mb-0">Kelola pemasukan dan pengeluaran desa disini.</p>
    </div>
    <a href="{{ route('kas.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-lg me-2"></i>Input Transaksi Baru
    </a>
</div>

<div class="card border-0 shadow-sm mb-4 text-white" style="background: linear-gradient(120deg, #198754, #20c997);">
    <div class="card-body p-4 text-center">
        <h5 class="text-white-50 text-uppercase fw-bold ls-1 mb-1">Saldo Kas Saat Ini</h5>
        <h1 class="display-4 fw-bold mb-0">
            Rp {{ number_format($saldo, 0, ',', '.') }}
        </h1>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h6 class="mb-0 fw-bold"><i class="bi bi-table me-2"></i>Riwayat Transaksi</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jenis</th>
                        <th>Jumlah (Rp)</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kas as $k)
                    <tr>
                        <td class="ps-4">{{ \Carbon\Carbon::parse($k->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $k->keterangan }}</td>
                        <td>
                            <span class="badge {{ $k->jenis == 'masuk' ? 'bg-success' : 'bg-danger' }}">
                                {{ $k->jenis == 'masuk' ? 'PEMASUKAN' : 'PENGELUARAN' }}
                            </span>
                        </td>
                        <td class="fw-bold {{ $k->jenis == 'masuk' ? 'text-success' : 'text-danger' }}">
                            Rp {{ number_format($k->jumlah, 0, ',', '.') }}
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('kas.edit', $k->id) }}" class="btn btn-warning btn-sm text-white">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('kas.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            Belum ada data transaksi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection