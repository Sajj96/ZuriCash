<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CryptoController extends Controller
{
    public function index()
    {
        return view('crypto.crypto-lessons');
    }

    public function show()
    {
        return view('crypto.create');
    }
}
