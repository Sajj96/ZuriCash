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

    public function withdraw(Request $request)
    {
        $user = Auth::user();
        if(!empty($request->id)) {
            $campaign = DB::table('stories')
                        ->join('donations', 'stories.id','donations.campaign_id')
                        ->select('stories.*',DB::raw('SUM(donations.amount) as amount'))
                        ->where('stories.owner_id', $user->id)
                        ->where('stories.id', $request->id)
                        ->groupBy('stories.id')
                        ->first();
        return view('admin.transactions.withdraw', compact('campaign'));
        }

        return view('admin.transactions.withdraw');
    }
}
