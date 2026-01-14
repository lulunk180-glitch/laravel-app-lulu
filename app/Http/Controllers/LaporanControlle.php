<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiKas; 

class LaporanController extends Controller
{
    public function index()
    {
        $transaksi = TransaksiKas::orderBy('tanggal', 'desc')->get();
        return view('laporan.index', compact('transaksi'));
    }

    public function cetak()
    {
        $transaksi = TransaksiKas::orderBy('tanggal', 'asc')->get();
        $masuk = TransaksiKas::where('jenis', 'masuk')->sum('jumlah');
        $keluar = TransaksiKas::where('jenis', 'keluar')->sum('jumlah');
        $saldo = $masuk - $keluar;

        return view('laporan.cetak', compact('transaksi', 'saldo'));
    }
}