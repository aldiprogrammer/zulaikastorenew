<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Store;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{

    function index($id = null)
    {
        if ($id == null) {
            $pegawai = Pegawai::with('store')->get();
        } else {

            $pegawai = Pegawai::with('store')->where('id_store', $id)->get();
        }


        $store = Store::all();
        $data = [
            'title' => 'Pegawai',
            'pegawai' => $pegawai,
            'store' => $store,
        ];
        return view('admin.pegawai', compact('data'));
    }

    function create(Request $request)
    {

        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
            'nowa' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_masuk' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'nik.required' => 'NIK tidak boleh kosong',
            'nowa.required' => 'No WA tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
            'tgl_masuk.required' => 'Tanggal Masuk tidak boleh kosong',
        ]);

        if ($validate == true) {

            $pegawai = new Pegawai();
            $pegawai->nama = $request->nama;
            $pegawai->alamat = $request->alamat;
            $pegawai->nik = $request->nik;
            $pegawai->nowa = $request->nowa;
            $pegawai->email = $request->email;
            $pegawai->jenis_kelamin = $request->jenis_kelamin;
            $pegawai->tgl_masuk = $request->tgl_masuk;
            $pegawai->id_store = $request->id_store;
            $pegawai->foto = '';
            $pegawai->save();
            return redirect()->route('pegawai')->with('success', 'Data Pegawai Berhasil Ditambahkan');
        }
    }


    function update(Request $request, $id)
    {

        $pegawai = Pegawai::find($id);
        $pegawai->nama = $request->nama;
        $pegawai->alamat = $request->alamat;
        $pegawai->nik = $request->nik;
        $pegawai->nowa = $request->nowa;
        $pegawai->email = $request->email;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tgl_masuk = $request->tgl_masuk;
        $pegawai->id_store = $request->id_store;
        $pegawai->foto = '';
        $pegawai->update();
        return redirect()->route('pegawai')->with('success', 'Data Pegawai Berhasil Diubah');
    }


    function delete($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return redirect()->route('pegawai')->with('success', 'Data Pegawai Berhasil Dihapus');
    }
}