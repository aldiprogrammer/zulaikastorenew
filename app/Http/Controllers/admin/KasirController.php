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
}
