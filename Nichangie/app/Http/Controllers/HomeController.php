<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $campaigns = DB::table('stories')
                        ->join('users','stories.owner_id','=','users.id')
                        ->select('stories.*','users.name','users.lastname')
                        ->get();
        return view('home', compact('campaigns'));
    }

    public function adminDashboard()
    {
        return view('admin.home');
    }

    public function doneeDashboard()
    {
        return view('admin.home');
    }

    public function show()
    {
        return view('auth.register_doner');
    }

    public function howItWorks()
    {
        return view('howitworks');
    }
}
