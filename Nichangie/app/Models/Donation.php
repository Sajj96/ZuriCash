<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Donation extends Model
{
    use HasFactory;

    public function campaignDonations($campaign_id,$user_id)
    {
        $donation = DB::table('stories')
                        ->leftJoin('donations', 'stories.id','donations.campaign_id')
                        ->select('stories.id','stories.title','stories.fundgoals','stories.deadline','stories.status','stories.description',DB::raw('SUM(donations.amount) as amount')) 
                        ->where('stories.owner_id', $user_id)
                        ->where('stories.id', $campaign_id)
                        ->groupBy('stories.id','stories.title','stories.fundgoals','stories.deadline','stories.status','stories.description')
                        ->get();
        $sum = 0;
        foreach($donation as $key=>$rows) {
            $sum += $rows->amount;
        }
        $donation_amount = $sum ?? 0;
        return $donation_amount;
    }

    public function userDonations($user_id)
    {
        $donation = DB::table('stories')
                        ->join('donations', 'stories.id','donations.campaign_id')
                        ->select('stories.id',DB::raw('SUM(donations.amount) as amount')) 
                        ->where('stories.owner_id', $user_id)
                        ->groupBy('stories.id')
                        ->get();
        $sum = 0;
        foreach($donation as $key=>$rows) {
            $sum += $rows->amount;
        }
        $donation_amount = $sum ?? 0;
        return $donation_amount;
    }
}
