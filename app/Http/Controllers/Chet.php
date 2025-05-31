<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use Illuminate\Http\Request;

class Chet extends Controller
{

    function index()
    {

        return view('chet1');
    }

    function chet2()
    {
        return view('chet2');
    }

    function kirim(Request $request)
    {
        $username = $request->username;
        $pesan = $request->pesan;
        $data = [
            'username' => $username,
            'pesan' =>  $pesan,
        ];
        NewMessage::dispatch();
    }
}
