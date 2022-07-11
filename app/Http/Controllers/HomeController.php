<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $transactions = new Transaction();
        $profit = $transactions->getProfit($user->id);
        $balance = $transactions->getUserBalance($user->id);
        $mainWithdrawn = $transactions->getUserWithdrawnAmount($user->id);
        $whatsapp = $transactions->getWhatsAppEarnings($user->id);
        $question = $transactions->getQuestionsEarnings($user->id);
        $video = $transactions->getVideoEarnings($user->id);
        $ads = $transactions->getAdsEarnings($user->id);
        $payment_for_downline = $transactions->getUserPaymentForDownline($user->id);
        $withdrawn = $mainWithdrawn + $payment_for_downline;

        $user_obj = new User();
        $all_users = $user_obj->getAllUsers();
        $active_users = $user_obj->getAllActiveUsers();
        $withdraw_requests = $transactions->getWithdrawRequests();
        $system_earnings = $transactions->getSystemEarnings();
        $transactionData = $transactions::where('transaction_type', $transactions::TYPE_WITHDRAW)
            ->where('status', $transactions::TRANSACTION_SUCCESS)
            ->get();

        $dayofweek = date('w', strtotime('2022-02-18'));
        $result = date('Y-m-d', strtotime((0 - $dayofweek) . ' day', strtotime('2022-02-18')));
        $todayEarning = 0;
        $totalWithdraw = 0;
        $today = date('Y-m-d');
        $notification = DB::table('notifications')
            ->orderByDesc('id')
            ->limit(1)
            ->get();

        foreach ($transactionData as $key => $rows) {
            $created_at = date('Y-m-d', strtotime($rows->created_at));
            if ($created_at == $today) {
                $todayEarning += $rows->fee;
            }
            $totalWithdraw += $rows->amount;
        }

        $rate = $transactions->getExchangeRate($user->id, 12000, 'TZS');

        $currency = $rate['currency'];
        $amount = $rate['amount'];
        $hours = '';
        $time = date('H');

        if ($time < "12") {
            $hours = 'Good morning';
        } else if ($time >= "12" && $time < "15") {
            $hours = 'Good afternoon';
        } else if ($time >= "15" && $time < "19") {
            $hours = 'Good evening';
        } else if ($time >= "19") {
            $hours = 'Good night';
        }

        $notification_output = '';

        foreach ($notification as $key => $rows) {
            $end_date = date('Y-m-d', strtotime($rows->created_at . " + 2 days"));;
            if ($today < $end_date) {
                $notification_output .= '<div class="alert alert-'. $rows->type .' alert-has-icon alert-dismissible show fade">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        '. $rows->message .'
                    </div>
                </div>';
            }
        }

        if ($user->user_type != 1) {
            // dd($notification);
            return view('home', compact('profit', 'balance', 'withdrawn', 'whatsapp', 'question', 'video', 'notification_output', 'currency', 'amount', 'ads', 'hours'));
        }

        $inactiveUsers = User::where('active', 0)->count();

        $newUsers = array();

        User::where('active', 1)->chunk(500, function($users){
            foreach ($users as $key => $rows) {
                $created_at = date('Y-m-d', strtotime($rows->created_at));
                $today = date('Y-m-d');
                if ($created_at == $today) {
                    $newUsers[] = $rows;
                }
            }
        });
        

        return view('home', compact('all_users', 'active_users', 'withdraw_requests', 'system_earnings', 'transactionData', 'todayEarning', 'totalWithdraw', 'newUsers', 'currency', 'amount', 'inactiveUsers', 'hours'));
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
