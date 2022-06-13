<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Services\ExchangeRateService;
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
        $id = Auth::user()->id; 

        $transactions = new Transaction();
        $profit = $transactions->getProfit($id);
        $balance = $transactions->getUserBalance($id);
        $mainWithdrawn = $transactions->getUserWithdrawnAmount($id);
        $whatsapp = $transactions->getWhatsAppEarnings($id);
        $question = $transactions->getQuestionsEarnings($id);
        $video = $transactions->getVideoEarnings($id);
        $ads = $transactions->getAdsEarnings($id);
        $payment_for_downline = $transactions->getUserPaymentForDownline($id);
        $withdrawn = $mainWithdrawn + $payment_for_downline;

        $user = new User();
        $all_users = $user->getAllUsers();
        $active_users = $user->getAllActiveUsers();
        $withdraw_requests = $transactions->getWithdrawRequests();
        $system_earnings = $transactions->getSystemEarnings();
        $transactionData = Transaction::where('transaction_type',Transaction::TYPE_WITHDRAW)
                                        ->where('status',Transaction::TRANSACTION_SUCCESS)
                                        ->get();

        $dayofweek = date('w', strtotime('2022-02-18'));
        $result = date('Y-m-d', strtotime((0 - $dayofweek).' day', strtotime('2022-02-18')));
        $todayEarning = 0;
        $totalWithdraw = 0;
        $today = date('Y-m-d');
        $notification = DB::table('notifications')
                            ->orderByDesc('id')
                            ->limit(1)
                            ->get();

        foreach($transactionData as $key => $rows) {
            $created_at = date('Y-m-d',strtotime($rows->created_at));
            if($created_at == $today) {
                $todayEarning += $rows->fee;
            }
            $totalWithdraw += $rows->amount;
        }

        $users = User::where('active', 1)->get();

        $inactiveUsers = User::where('active', 0)->get();

        $newUsers = array();

        foreach($users as $key => $rows) {
            $created_at = date('Y-m-d',strtotime($rows->created_at));
            if($created_at == $today) {
                $newUsers[] = $rows;
            }
        }

        $currency = "TZS";
        $amount = 12000;

        // $exchange = app(ExchangeRateService::class);

        // $rate = (object) json_decode($exchange->getRate());

        if(Auth::user()->country == "tz") {
            $currency = $currency;
            $amount = $amount;
        } else if(Auth::user()->country == "ke") {
            $currency = "KES";
            $amount = 0.05 * $amount;
        } else if(Auth::user()->country == "ug") {
            $currency = "UGX";
            $amount = 1.61034 * $amount;
        } else {
            $currency = "USD";
            $amount = $amount / 2328;
        }

        if(Auth::user()->user_type != 1) {
            return view('home', compact('profit','balance','withdrawn','whatsapp','question','video','notification','currency','amount','ads'));
        }

        return view('home', compact('all_users','active_users','withdraw_requests','system_earnings','transactionData','todayEarning','totalWithdraw','newUsers','inactiveUsers'));
    }

    /**
     * Show the payment information page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPaymentInformationPage(Request $request)
    {
        $country = $request->session()->get('country');
        return view('payment', compact('country'));
    }
}
