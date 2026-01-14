<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $wargas = Warga::paginate(10);
        return view('warga.index', compact('wargas'));
    }

    public function create()
    {
        return view('warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:wargas,nik',
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        Warga::create($request->all());
        return redirect()->route('warga.index')->with('success', 'Data Warga Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $warga = Warga::findOrFail($id);
        $warga->update($request->all());
        return redirect()->route('warga.index')->with('success', 'Data Warga Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Data Warga Berhasil Dihapus');
    }

    public function cetak()
    {
        $warga = Warga::all();
        return view('warga.cetak', compact('warga'));
    }
}