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
            $html = '
    
         
            <div class="card shadow-sm" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div style="position: absolute;">
                    <span class="badge badge-success">Disc : ' . $cekproduk->diskon . '%</span>
                </div>
                <img src="' . asset('storage/' . $cekproduk->foto) . '" class="card-img-top" alt="' . $cekproduk->nama_produk . '" style="height: 180px; object-fit: cover;">
                <div class="card-body">
                    <p class="card-title text-truncate text-center">
                        ' . $cekproduk->nama_produk . '<br />
                        <span class="fw-bold badge badge-danger"><b>' . $cekproduk->kode_produk . '</b></span>
                    </p>
                    <h6 class="text-primary text-center">Rp ' . number_format($cekproduk->harga_jual, 0, ',', '.') . '</h6>
                </div>
                <button class="btn btn-sm btn-primary w-100" style="border-radius: 10px">
                    <i class="bi bi-cart-plus"></i> <i class="fas fa-plus"></i> Tambah
                </button>
            </div>';

            echo $html;
        } else {
            echo "";
        }
    }
}
