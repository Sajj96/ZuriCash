<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $causes = Cause::all();
        return view('home', compact('causes'));
    }

    public function show()
    {
        return view('auth.register_doner');
    }
}
