<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    function index()
    {
        $pengguna = Pengguna::all();
        $data = [
            'title' => 'Pengguna',
            'pengguna' => $pengguna,
        ];
        return view('admin.pengguna', compact('data'));
    }

    function create(Request $request)
    {
        $pengguna = new Pengguna();
        $pengguna->username = $request->username;
        $pengguna->level = $request->level;
        $pengguna->password = Hash::make($request->password);
        $pengguna->save();
        return redirect()->route('pengguna')->with('success', 'Data berhasil ditambah');
    }

    function update(Request $request, $id)
    {
        $pengguna = Pengguna::find($id);
        $pengguna->username = $request->username;
        $pengguna->level = $request->level;
        if ($request->passsowrd != null) {
            $pengguna->password = Hash::make($request->password);
        }
        $pengguna->update();
        return redirect()->route('pengguna')->with('success', 'Data berhasil diubah');
    }

    function delete($id)
    {
        $pengguna = Pengguna::find($id);
        $pengguna->delete();
        return redirect()->route('pengguna')->with('success', 'Data berhasil dihapus');
    }
}