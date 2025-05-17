<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('admin.index', compact('data'));
    }
}
