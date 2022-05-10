<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Story;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
                        ->where('stories.status','<>',3)
                        ->get();
        $campaign_data = array();
        $today = date('Y-m-d');
        foreach($campaigns as $key=>$rows) {
            if(strtotime($rows->deadline) < strtotime($today)) {
                $complete_campaign = Story::find($rows->id);
                $complete_campaign->status = Story::STATUS_COMPLETED;
                $complete_campaign->save();
            }
            
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

        $transaction = new Transaction;

        $user = Auth::user();
        $withdrawn = $transaction->userTransactions($user->id);
        $balance = $transaction->userBalance($user->id);

        $user_campaings = Story::where('owner_id', $user->id)->count();
        $total_donations = DB::table('donations')
                                ->join('stories','donations.campaign_id','stories.id')
                                ->where('stories.owner_id', $user->id)
                                ->sum('donations.amount');
        return view('admin.home',compact('user_campaings','total_donations','withdrawn','balance'));
    }

    public function show()
    {
        return view('auth.register_doner');
    }

    public function howItWorks()
    {
        return view('howitworks');
    }

    public function privacyPolicy()
    {
        return view('privacypolicy');
    }

    public function contactUs()
    {
        return view('contact');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function editProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'phone' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->route('profile')->with('error','First name, Last name and Phone number are all required!');
        }

        try {
            $user = Auth::user();
            $user_data = User::find($user->id);
            $user_data->name = $request->fname;
            $user_data->lastname = $request->lname;
            $user_data->phonenumber = $request->phone;
            $user_data->location = $request->location;
            $user_data->district = $request->district;
            $user_data->city = $request->city;
            $user_data->email = $request->email;
            if($user_data->save()) {
                return redirect()->route('profile')->with('success','Profile was updated successfully!');
            }

        } catch (\Exception $e) {
            return redirect()->route('profile')->with('error','Something went wrong!');
        }
    }
}
