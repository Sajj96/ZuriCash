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
        $campaign_data = array();
        foreach($campaigns as $key=>$rows) {
            $donations = DB::table('donations')
                            ->where('campaign_id', $rows->id)
                            ->get();
            $total_donations = DB::table('donations')
                                ->where('campaign_id', $rows->id)
                                ->sum('amount');
            $donation_percent = ($total_donations/$rows->fundgoals) * 100;
            $donation_array = (object) array(
                "total_donation"      => $total_donations,
                "donation_percentage" => $donation_percent,
                "doners"              => count($donations)
            );
            $campaign_data[] = (object) array_merge((array) $rows, (array) $donation_array);;
        }

        return view('home', compact('campaign_data'));
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
