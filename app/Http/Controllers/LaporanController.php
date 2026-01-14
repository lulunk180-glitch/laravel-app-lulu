<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiKas; // <--- Pastikan ini sesuai dengan nama Model kamu

class LaporanController extends Controller
{
    /**
     * Halaman Utama Laporan (Tabel biasa)
     */
    public function index()
    {
        // 1. Ambil data transaksi dari database
        $transaksi = TransaksiKas::orderBy('tanggal', 'desc')->get();

        // 2. Kirim variabel $transaksi ke view
        return view('laporan.index', compact('transaksi'));
    }

    /**
     * Halaman Cetak (Print PDF)
     */
    public function cetak()
    {
        // Ambil data (urut tanggal lama ke baru untuk laporan)
        $transaksi = TransaksiKas::orderBy('tanggal', 'asc')->get();
        
        // Hitung Saldo Akhir untuk ditampilkan di laporan cetak
        $masuk = TransaksiKas::where('jenis', 'masuk')->sum('jumlah');
        $keluar = TransaksiKas::where('jenis', 'keluar')->sum('jumlah');
        $saldo = $masuk - $keluar;

        // Kirim data ke view cetak
        return view('laporan.cetak', compact('transaksi', 'saldo'));
    }
}