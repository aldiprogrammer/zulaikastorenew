<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Shiftkerja;
use Illuminate\Http\Request;

class ShifkerjaController extends Controller
{
    function index()
    {
        $shift = Shiftkerja::all();
        $data = [
            'title' => 'Shift Kerja',
            'shift' => $shift,
        ];
        return view('admin.shiftkerja', compact('data'));
    }

    function create(Request $request)
    {

        $shift = new Shiftkerja();
        $shift->shiftkerja = $request->shiftkerja;
        $shift->jam_masuk = $request->jam_masuk;
        $shift->jam_keluar = $request->jam_keluar;
        $shift->save();
        return redirect()->route('shiftkerja')->with('success', 'Data berhasil ditambah');
    }

    function update(Request $request, $id)
    {

        $shift = Shiftkerja::find($id);
        $shift->shiftkerja = $request->shiftkerja;
        $shift->jam_masuk = $request->jam_masuk;
        $shift->jam_keluar = $request->jam_keluar;
        $shift->update();
        return redirect()->route('shiftkerja')->with('success', 'Data berhasil diubah');
    }

    function delete($id)
    {
        $shift = Shiftkerja::find($id);
        $shift->delete();
        return redirect()->route('shiftkerja')->with('success', 'Data berhasil dihapus');
    }
}
