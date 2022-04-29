<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::user()->user_type == 2) {
            return view('admin.home');
        }

        $user = Auth::user();
        $user_campaings = Story::where('owner_id', $user->id)->count();
        return view('admin.home',compact('user_campaings'));
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
