<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\Penjualan;
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
            'kode_tr' => 'TR-' . rand(1000000, 0),
        ];
        return view('admin.kasir', compact('data'));
    }

    function create(Request $request)
    {

        $kode = $request->kode;
        $cekproduk = Produk::where('kode_produk', $kode)->first();
        if ($cekproduk) {
            $html = '
            <div class="card shadow-sm" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 2px solid black">
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


            $penjualan = new Penjualan();

            $ds =  $cekproduk->harga_jual * ($cekproduk->diskon / 100);
            $diskon = $cekproduk->harga_jual  - $ds;

            $penjualan->kode_transaksi = $request->kode_transaksi;
            $penjualan->id_produk = $cekproduk->id;
            $penjualan->qty = 1;
            $penjualan->harga = $cekproduk->harga_jual;
            $penjualan->diskon = $cekproduk->diskon;
            $penjualan->harga_bayar = $diskon;
            $penjualan->total = $diskon;
            $penjualan->id_pengguna = '';
            $penjualan->tanggal = date('Y-m-d');
            $simpan = $penjualan->save();

            if ($simpan == true) {
                $pn = Penjualan::with('produk')->where('kode_transaksi', $request->kode_transaksi)->get();

                $listorder = '';
                foreach ($pn as $item) {
                    $listorder .= '
                        <div class="list-item" data-id="' . $item->id . '">
                        <div class="d-flex justify-content-between">
                                <div class="fw-bol">
                                   <h6>' . $item->produk->nama_produk . '</h6>
                                   <div>
                                    <span class="badge badge-dark">Qty : ' . $item->qty . '</span>
                                    </div>
                                </div>
                                <div>
                                    ' . number_format($item->harga, 0, '.') . ' | <span class="badge badge-success">disc: ' . $item->diskon . '%</span>
                                    <div><h6> Total : ' . number_format($item->total, 0, '.') . '</h6></div>
                                    <span class="badge badge-danger btn-sm hapus-list" id="hapuslist" data-id="' . $item->id . '" style="cursor : pointer"><i class="fas fa-trash"></i></span>
                                </div>
                    </div>
                    <hr />
                    </div>
                    
                    ';
                }

                $total = Penjualan::where('kode_transaksi', $request->kode_transaksi)->sum('total');
                return response()->json([
                    'showproduk' => $html,
                    'pesan' =>  '<p class="text-center text-success mt-2 fw-bold">Produk dengan Kode : ' . $kode . ' berhasil ditemukan</p>',
                    'listorder' => $listorder,
                    'totalharga' => '<h5>Total : ' . number_format($total, '0', '.') . '</h5>',
                    'formtotal' => $total,
                ]);
            }
        } elseif ($cekproduk == false || $kode == '') {
            $html = '
                <div class="card shadow-sm" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
               
                <img src="' . asset('assets/admin/images/imagereview.jpeg') . '" class="card-img-top" alt="No Produk" style="height: 180px; object-fit: cover;">
                <div class="card-body">
                    <p class="card-title text-truncate text-center">
                        No Produk <br />
                        <span class="fw-bold badge badge-secondary"><b>No Kode</b></span>
                    </p>
                    <h6 class="text-secondary text-center">Rp 000.000</h6>
                </div>
                <button class="btn btn-sm btn-secondary w-100" style="border-radius: 10px">
                    <i class="bi bi-cart-plus"></i> <i class="fas fa-plus"></i> Tambah
                </button>
            </div>';
            return response()->json([
                'showproduk' => $html,
                'pesan' =>  '<p class="text-center text-danger mt-2 fw-bold">Produk dengan Kode : ' . $kode . ' tidak ditemukan</p>'
            ]);
        }
    }

    function delete(Request $request)
    {
        $id = $request->id;
        $kode = $request->kode_transaksi;

        $pen = Penjualan::find($id);
        $hapus = $pen->delete();
        if ($hapus) {
            $total = Penjualan::where('kode_transaksi', $kode)->sum('total');
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil dihapus',
                'total' => '<h5>Total : ' . number_format($total, '0', '.') . '</h5>',
                'formtotal' => $total,
            ]);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }
}
