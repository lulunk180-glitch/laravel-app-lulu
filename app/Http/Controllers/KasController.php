<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiKas;

class KasController extends Controller
{
    public function index()
    {
        $kas = TransaksiKas::orderBy('tanggal', 'desc')->get();
        $pemasukan = TransaksiKas::where('jenis', 'masuk')->sum('jumlah');
        $pengeluaran = TransaksiKas::where('jenis', 'keluar')->sum('jumlah');
        $saldo = $pemasukan - $pengeluaran;

        return view('kas.index', compact('kas', 'saldo'));
    }

    public function create()
    {
        return view('kas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis'   => 'required',
            'jumlah'  => 'required|numeric',
            'keterangan' => 'required|string',
        ]);

        TransaksiKas::create($request->all());

        return redirect()->route('kas.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function edit($id)
    {
        $kas = TransaksiKas::findOrFail($id);
        return view('kas.edit', compact('kas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required',
        ]);

        $kas = TransaksiKas::findOrFail($id);
        
        $kas->update([
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kas.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kas = TransaksiKas::findOrFail($id);
        $kas->delete();

        return redirect()->route('kas.index')->with('success', 'Data Berhasil Dihapus!');
    }
}