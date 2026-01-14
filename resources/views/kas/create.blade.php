@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Input Transaksi Kas</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kas.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label>Tanggal Transaksi</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Jenis Transaksi</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" value="masuk" id="masuk" checked>
                                <label class="form-check-label" for="masuk">Pemasukan (Uang Masuk)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" value="keluar" id="keluar">
                                <label class="form-check-label" for="keluar">Pengeluaran (Uang Keluar)</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Jumlah (Rp)</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Contoh: 50000" required>
                    </div>

                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2" placeholder="Contoh: Iuran Sampah Bapak Budi" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Simpan Transaksi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection