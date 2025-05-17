<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori as ModelsKategori;
use Illuminate\Http\Request;

class Kategori extends Controller
{
    function index()
    {
        $kategori = ModelsKategori::all();
        $data = [
            'title' => 'Kategori',
            'kategori' => $kategori,
        ];
        return view('admin.kategori', compact('data'));
    }

    function create(Request $request)
    {
        $validatet = $request->validate([
            'kategori' => 'required',
        ], [
            'kategori.required' => 'Kategori tidak boleh kosong'
        ]);
        if ($validatet == true) {
            $kategori = new ModelsKategori();
            $kategori->kategori = $request->kategori;
            $kategori->save();
            return redirect()->route('kategori')->with('success', "Data berhasil ditambah");
        }
    }

    function update(Request $request, $id)
    {

        $validatet = $request->validate([
            'kategori' => 'required',
        ], [
            'kategori.required' => 'Kategori tidak boleh kosong'
        ]);
        if ($validatet == true) {
            $kategori = ModelsKategori::find($id);
            $kategori->kategori = $request->kategori;
            $kategori->update();
            return redirect()->route('kategori')->with('success', "Data berhasil diubah");
        }
    }

    function delete($id)
    {
        $kategori = ModelsKategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori')->with('success', "Data berhasil dihapus");
    }
}
