@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-warning text-white fw-bold">
                <i class="bi bi-pencil-square me-2"></i>Edit Transaksi Kas
            </div>
            <div class="card-body p-4">
                
                <form action="{{ route('kas.update', $kas->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-3">
                        <label class="form-label">Tanggal Transaksi</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ $kas->tanggal }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Jenis Transaksi</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis" value="masuk" {{ $kas->jenis == 'masuk' ? 'checked' : '' }}>
                            <label class="form-check-label text-success fw-bold">Pemasukan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis" value="keluar" {{ $kas->jenis == 'keluar' ? 'checked' : '' }}>
                            <label class="form-check-label text-danger fw-bold">Pengeluaran</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah (Rp)</label>
                        <input type="number" name="jumlah" class="form-control" value="{{ $kas->jumlah }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3" required>{{ $kas->keterangan }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kas.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning text-white fw-bold">Update Transaksi</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection