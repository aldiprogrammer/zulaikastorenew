<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    //
    function index()
    {
        $penjualan = Penjualan::all();
        $data = [
            'title' => 'Penjualan',
            'penjualan' => $penjualan,
        ];
        return view('admin.penjualan', compact('data'));
    }
}
