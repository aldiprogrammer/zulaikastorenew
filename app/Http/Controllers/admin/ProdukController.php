<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{

    function index()
    {
        $produk = Produk::with('kategori')->get();
        $kt = Kategori::all();
        $kode = 'PRD-' . rand(0, 100000);
        $data = [
            'title' => "Produk",
            'produk' => $produk,
            'kategori' => $kt,
            'kode' => $kode,
        ];
        return view('admin.produk', compact('data'));
    }

    function create(Request $request)
    {

        $validata = $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        if ($validata == false) {
            return redirect()->route('produk')->with('error', 'Data gagal disimpan');
        } else {

            $pr = new Produk();
            $path = $request->file('foto')->store('images', 'public');
            $pr->kode_produk = $request->kode_produk;
            $pr->nama_produk = $request->nama_produk;
            $pr->ukuran = $request->ukuran;
            $pr->stok = $request->stok;
            $pr->harga_jual = $request->harga_jual;
            $pr->harga_beli = $request->harga_beli;
            $pr->diskon = $request->diskon;
            $pr->id_kategori = $request->id_kategori;
            $pr->tgl_masuk = $request->tgl_masuk;
            $pr->foto = $path;
            $pr->like = '';
            $pr->save();
            return redirect()->route('produk')->with('success', 'Data berhasil disimpan');
        }
    }

    function update(Request $request, $id)
    {

        $validata = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);
        $pr = Produk::find($id);
        if ($request->hasFile('foto')) {
            if ($pr->foto && Storage::disk('public')->exists($pr->foto)) {
                Storage::disk('public')->delete($pr->foto);
            }

            $path = $request->file('foto')->store('images', 'public');
            $pr->nama_produk = $request->nama_produk;
            $pr->ukuran = $request->ukuran;
            $pr->stok = $request->stok;
            $pr->harga_jual = $request->harga_jual;
            $pr->harga_beli = $request->harga_beli;
            $pr->diskon = $request->diskon;
            $pr->id_kategori = $request->id_kategori;
            $pr->tgl_masuk = $request->tgl_masuk;
            $pr->foto = $path;
            $pr->like = '';
            $pr->update();
            return redirect()->route('produk')->with('success', 'Data berhasil diubah');
        } else {

            $pr->ukuran = $request->ukuran;
            $pr->stok = $request->stok;
            $pr->harga_jual = $request->harga_jual;
            $pr->harga_beli = $request->harga_beli;
            $pr->diskon = $request->diskon;
            $pr->id_kategori = $request->id_kategori;
            $pr->tgl_masuk = $request->tgl_masuk;
            // $pr->foto = $pr->foto;
            $pr->like = '';
            $pr->update();
            return redirect()->route('produk')->with('success', 'Data berhasil diubah');
        }
    }

    function delete($id)
    {
        $pr = Produk::find($id);
        $pr->delete();
        return redirect()->route('produk')->with('success', 'Data berhasil dihapus');
    }
}
