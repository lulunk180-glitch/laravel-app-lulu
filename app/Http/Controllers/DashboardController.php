<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\TransaksiKas;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $total_warga = Warga::count();
        } catch (\Exception $e) {
            $total_warga = 0;
        }

        try {
            $pemasukan = TransaksiKas::where('jenis', 'masuk')->sum('jumlah');
            $pengeluaran = TransaksiKas::where('jenis', 'keluar')->sum('jumlah');
            $saldo = $pemasukan - $pengeluaran;
            $transaksi = TransaksiKas::latest()->take(5)->get();
            
        } catch (\Exception $e) {
            $saldo = 0;
            $transaksi = collect([]); 
        }
        return view('dashboard', compact('total_warga', 'saldo', 'transaksi'));
    }
}