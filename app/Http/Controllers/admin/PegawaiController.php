<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Shiftkerja;
use App\Models\Store;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{

    function index($id = null)
    {
        if ($id == null) {
            $pegawai = Pegawai::with('store', 'shiftkerja')->get();
        } else {

            $pegawai = Pegawai::with('store', 'shiftkerja')->where('id_store', $id)->get();
        }


        $store = Store::all();
        $shift = Shiftkerja::all();
        $data = [
            'title' => 'Pegawai',
            'pegawai' => $pegawai,
            'store' => $store,
            'shift' => $shift,
        ];
        return view('admin.pegawai', compact('data'));
    }

    function create(Request $request)
    {

        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nik' => 'required | max:16',
            'nowa' => 'required |max:13',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_masuk' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'nik.required' => 'NIK tidak boleh kosong',
            'nik.max' => "Panjang NIK harus 16 karekter",
            'nowa.required' => 'No WA tidak boleh kosong',
            'nowa.max' => 'No whatsapp harus 13 karekter',
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
            $pegawai->id_shiftkerja = $request->shift;
            $pegawai->foto = '';
            $pegawai->save();
            return redirect()->route('allpegawai')->with('success', 'Data Pegawai Berhasil Ditambahkan');
        }
    }


    function update(Request $request, $id)
    {

        $validate = $request->validate([
            'nik' => 'required | max:16',
            'nowa' => 'required |max:13',

        ], [
            'nik.max' => "Panjang NIK harus 16 karekter",
            'nowa.max' => 'No whatsapp harus 13 karekter',
        ]);

        if ($validate == true) {
            $pegawai = Pegawai::find($id);
            $pegawai->nama = $request->nama;
            $pegawai->alamat = $request->alamat;
            $pegawai->nik = $request->nik;
            $pegawai->nowa = $request->nowa;
            $pegawai->email = $request->email;
            $pegawai->jenis_kelamin = $request->jenis_kelamin;
            $pegawai->tgl_masuk = $request->tgl_masuk;
            $pegawai->id_store = $request->id_store;
            $pegawai->id_shiftkerja = $request->shift;
            $pegawai->foto = '';
            $pegawai->update();
            return redirect()->route('allpegawai')->with('success', 'Data Pegawai Berhasil Diubah');
        }
    }


    function delete($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return redirect()->route('allpegawai')->with('success', 'Data Pegawai Berhasil Dihapus');
    }
}
