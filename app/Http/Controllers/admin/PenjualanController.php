<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    //
    function index()
    {
        $penjualan = Penjualan::with('produk')->get();
        $data = [
            'title' => 'Penjualan',
            'penjualan' => $penjualan,
            'produk' => Produk::all(),
        ];

        return view('admin.penjualan', compact('data'));
    }

    function create(Request $request)
    {
        $idproduk = $request->id_produk;
        $produk = Produk::where('id', $idproduk)->first();
        $idproduk = $produk->id;
        if ($produk->qty > $request->qty) {
            return redirect()->route('penjualan')->with('error', 'Stok tidak mencukupi');
        } else {

            $qty = $produk->stok - $request->qty;
            $updateqty = Produk::find($idproduk);
            $updateqty->stok = $qty;
            $updateqty->update();

            $pp = new Penjualan();
            $pp->kode_transaksi = $request->kode;
            $pp->id_produk = $request->id_produk;
            $pp->qty = $request->qty;
            $pp->harga = $request->harga;
            $pp->diskon = $request->diskon;
            $pp->total = $request->total_harga;
            $pp->harga_bayar = $request->harga_bayar;
            $pp->tanggal = $request->tgl;
            $pp->id_pengguna = '';
            $pp->save();
            return redirect()->route('penjualan')->with('success', 'Data berhail ditambah');
        }
    }

    function update(Request $request, $id)
    {

        $pp = Penjualan::find($id);
        $pp->kode_transaksi = $request->kode;
        $pp->id_produk = $request->id_produk;
        $pp->qty = $request->qty;
        $pp->harga = $request->harga;
        $pp->diskon = $request->diskon;
        $pp->total = $request->total_harga;
        $pp->harga_bayar = $request->harga_bayar;
        $pp->tanggal = $request->tgl;
        $pp->id_pengguna = '';
        $pp->update();
        return redirect()->route('penjualan')->with('success', 'Data berhail diubah');
    }

    function delete($id)
    {
        $pp = Penjualan::find($id);
        $pp->delete();
        return redirect()->route('penjualan')->with('success', 'Data berhail dihapus');
    }
}
