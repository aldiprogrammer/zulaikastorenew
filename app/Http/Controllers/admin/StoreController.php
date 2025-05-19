<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    function index()
    {
        $store = Store::all();
        $data = [
            'title' => 'Store',
            'store' => $store
        ];
        return view('admin.store', compact('data'));
    }

    function create(Request $request)
    {

        $store = new Store();
        $store->store = $request->store;
        $store->alamat = $request->alamat;
        $store->save();
        return redirect()->route('store')->with('success', 'Data store Berhasil Ditambah');
    }

    function update(Request $request, $id)
    {
        $store = Store::find($id);
        $store->store = $request->store;
        $store->alamat = $request->alamat;
        $store->update();
        return redirect()->route('store')->with('success', 'Data store Berhasil Diubah');
    }

    function delete($id)
    {
        $store = Store::find($id);
        $store->delete();
        return redirect()->route('store')->with('success', 'Data store Berhasil Dihapus');
    }
}
