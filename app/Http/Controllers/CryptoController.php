<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CryptoController extends Controller
{
    public function index()
    {
        $crypto = Crypto::all();
        return view('crypto.crypto-lessons', compact('crypto'));
    }

    public function show()
    {
        return view('crypto.create');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'   => 'required|string',
            'link'   => 'required|string'
        ]);

        if($validator->fails()) {
            return redirect()->route('crypto.show')->with('error','Only valid details are required!');
        }

        try {
            $crypto = new Crypto;
            $crypto->title = $request->title;
            $crypto->link = $request->link;
            if($crypto->save()){
                return redirect()->route('crypto.show')->with('success','Link added successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->route('crypto.show')->with('error','Something went wrong!');
        }
    }
}
