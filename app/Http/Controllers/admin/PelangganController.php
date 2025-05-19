<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    function index()
    {
        $pelanggan = Pelanggan::all();
        $data = [
            'title' => 'Pelanggan',
            'pelanggan' => $pelanggan,
            'kode' => 'PLG-' . rand(0, 10000),
        ];
        return view('admin.pelanggan', compact('data'));
    }

    function create(Request $request)
    {

        $validate = $request->validate([
            'nik' => 'max:16',
            'no_telp' => 'max:13',
        ], [
            'nik.max' => 'Panjang NIK harus 16 karekter',
            'no_telp' => 'Panjang nomor telpon harus 13 karekter',
        ]);

        if ($validate == true) {
            $pl =  new Pelanggan();
            $pl->kode_pelanggan = $request->kode;
            $pl->nama = $request->nama;
            $pl->nik = $request->nik;
            $pl->alamat = $request->alamat;
            $pl->no_telp = $request->no_telp;
            $pl->jenis_kelamin = $request->jk;
            $pl->tgl_daftar = $request->tgl_daftar;
            $pl->save();
            return redirect()->route('pelanggan')->with('success', 'Data berhasil disimpan');
        }
    }

    function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nik' => 'max:16',
            'no_telp' => 'max:13',
        ], [
            'nik.max' => 'Panjang NIK harus 16 karekter',
            'no_telp' => 'Panjang nomor telpon harus 13 karekter',
        ]);

        if ($validate == true) {
            $pl = Pelanggan::find($id);
            $pl->nama = $request->nama;
            $pl->nik = $request->nik;
            $pl->alamat = $request->alamat;
            $pl->no_telp = $request->no_telp;
            $pl->jenis_kelamin = $request->jk;
            $pl->tgl_daftar = $request->tgl_daftar;
            $pl->update();
            return redirect()->route('pelanggan')->with('success', 'Data berhasil diubah');
        }
    }

    function delete($id)
    {
        $pl = Pelanggan::find($id);
        $pl->delete();
        return redirect()->route('pelanggan')->with('success', 'Data berhasil dihapus');
    }
}
