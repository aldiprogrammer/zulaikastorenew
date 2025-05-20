<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    function index()
    {
        $data = [
            'title' => 'Jabatan',
            'jabatan' => Jabatan::all(),
        ];
        return view('admin.jabatan', compact('data'));
    }

    function create(Request $request)
    {

        $jb = new Jabatan();
        $jb->jabatan = $request->jabatan;
        $jb->save();
        return redirect()->route('jabatan')->with('success', 'Jabatan berhasil ditambah');
    }

    function update(Request $request, $id)
    {

        $jb = Jabatan::find($id);
        $jb->jabatan = $request->jabatan;
        $jb->update();
        return redirect()->route('jabatan')->with('success', 'Jabatan berhasil diubah');
    }

    function delete($id)
    {
        $jb = Jabatan::find($id);
        $jb->delete();
        return redirect()->route('jabatan')->with('success', 'Jabatan berhasil dihapus');
    }
}