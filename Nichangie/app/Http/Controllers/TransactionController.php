<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        return view('admin.transactions.transaction');
    }

    public function getCampaignDonations()
    {
        $user = Auth::user();
        $campaigns = DB::table('stories')
                        ->join('donations', 'stories.id','donations.campaign_id')
                        ->select('stories.*',DB::raw('SUM(donations.amount) as amount'))
                        ->where('stories.owner_id', $user->id)
                        ->orderBy('stories.id', 'DESC')
                        ->groupBy('stories.id')
                        ->get();
    }
}
