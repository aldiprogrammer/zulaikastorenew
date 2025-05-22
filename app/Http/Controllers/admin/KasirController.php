<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    function index()
    {
        $data = [
            'title' => 'Kasir',
            'produk' => Produk::paginate(6),
            'jml_produk' => Produk::count(),
        ];
        return view('admin.kasir', compact('data'));
    }

    function create(Request $request)
    {

        $kode = $request->kode;
        $cekproduk = Produk::where('kode_produk', $kode)->first();
        if ($cekproduk) {

            echo $cekproduk->nama_produk;
        } else {
            echo "kosong";
        }
    }
}
