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
                        ->leftJoin('donations', 'stories.id','donations.campaign_id')
                        ->select('stories.id','stories.title','stories.fundgoals','stories.deadline','stories.status','stories.description',DB::raw('SUM(donations.amount) as amount')) 
                        ->where('stories.owner_id', $user->id)
                        ->where('stories.id', $request->id)
                        ->groupBy('stories.id','stories.title','stories.fundgoals','stories.deadline','stories.status','stories.description')
                        ->first();
        return view('admin.transactions.withdraw', compact('campaign'));
        }

        return view('admin.transactions.withdraw');
    }
}
