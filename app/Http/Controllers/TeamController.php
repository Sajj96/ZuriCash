<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Show the Level 1 page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = new User;
        $active_referrals = $user->getLevelOneActiveReferrals($id);

        $active_referrals = count($active_referrals) ?? 0;

        $transaction = new Transaction;
        $rate = $transaction->getExchangeRate($id,5000,'TZS');

        $currency = $rate['currency'];
        $amount = $rate['amount'];
        

        $downlines = $user->getLevelOneDownlines($id);
        $serial = 1;
        return view('team.level_one', compact('downlines', 'serial', 'active_referrals','amount','currency'));
    }

    /**
     * Show the Level 2 page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLevelTwo()
    {
        $id = Auth::user()->id;
        $user = new User;
        $active_referrals = $user->getLevelTwoActiveReferrals($id);

        $active_referrals = count($active_referrals) ?? 0;

        $transaction = new Transaction;
        $rate = $transaction->getExchangeRate($id,3000,'TZS');

        $currency = $rate['currency'];
        $amount = $rate['amount'];
        
        $downlines = $user->getLevelTwoDownlines($id);
        $serial = 1;
        return view('team.level_two', compact('downlines', 'serial', 'active_referrals','amount','currency'));
    }

    /**
     * Show the Level 3 page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLevelThree()
    {
        $id = Auth::user()->id;
        $user = new User;
        $active_referrals = $user->getLevelThreeActiveReferrals($id);

        $active_referrals = count($active_referrals) ?? 0;

        $transaction = new Transaction;
        $rate = $transaction->getExchangeRate($id,2000,'TZS');

        $currency = $rate['currency'];
        $amount = $rate['amount'];

        $downlines = $user->getLevelThreeDownlines($id);
        $serial = 1;
        return view('team.level_three', compact('downlines', 'serial','active_referrals','amount','currency'));
    }
}
