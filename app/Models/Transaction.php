<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    const TRANSACTION_PENDING = 0;
    const TRANSACTION_SUCCESS = 1;
    const TRANSACTION_CANCELLED = 2;

    const REGISTRATION_FEE = 12000;

    const TYPE_WITHDRAW = "Withdraw";
    const TYPE_QUESTIONS = "Trivia";
    const TYPE_WHATSAPP = "WhatsApp";
    const TYPE_VIDEO = "Video";
    const TYPE_PAY_FOR_DOWNLINE = "pay_for_downline";
    const TYPE_ADCLICK = "Adclick";

    /**
     * Get user total earning.
     *
     * @return float
     */
    public function getUserTotalEarnings($id)
    {
        $rate1 = $this->getExchangeRate($id,5000,'TZS');
        $rate2 = $this->getExchangeRate($id,3000,'TZS');
        $rate3 = $this->getExchangeRate($id,2000,'TZS');
        $referral_amount_level_1 = $rate1['amount'];
        $referral_amount_level_2 = $rate2['amount'];
        $referral_amount_level_3 = $rate3['amount'];
        

        $level_1 = DB::table('users','t1')
                    ->leftJoin('users as t2', 't2.referrer_id','=','t1.id')
                    ->where(DB::raw('t1.id'), DB::raw($id))
                    ->where(DB::raw('t1.active'), DB::raw(User::USER_STATUS_ACTIVE))
                    ->where(DB::raw('t2.active'), DB::raw(User::USER_STATUS_ACTIVE))
                    ->get();

        $level_2 = DB::table('users','t1')
                    ->leftJoin('users as t2', 't2.referrer_id','=','t1.id')
                    ->leftJoin('users as t3', 't3.referrer_id','=','t2.id')
                    ->where(DB::raw('t1.id'), DB::raw($id))
                    ->where(DB::raw('t1.active'), DB::raw(User::USER_STATUS_ACTIVE))
                    ->where(DB::raw('t2.active'), DB::raw(User::USER_STATUS_ACTIVE))
                    ->where(DB::raw('t3.active'), DB::raw(User::USER_STATUS_ACTIVE))
                    ->get();

        $level_3 = DB::table('users','t1')
                    ->leftJoin('users as t2', 't2.referrer_id','=','t1.id')
                    ->leftJoin('users as t3', 't3.referrer_id','=','t2.id')
                    ->leftJoin('users as t4', 't4.referrer_id','=','t3.id')
                    ->where(DB::raw('t1.id'), DB::raw($id))
                    ->where(DB::raw('t1.active'), DB::raw(User::USER_STATUS_ACTIVE))
                    ->where(DB::raw('t2.active'), DB::raw(User::USER_STATUS_ACTIVE))
                    ->where(DB::raw('t3.active'), DB::raw(User::USER_STATUS_ACTIVE))
                    ->where(DB::raw('t4.active'), DB::raw(User::USER_STATUS_ACTIVE))
                    ->get();

        $count_level_1 = count($level_1) ?? 0;
        $count_level_2 = count($level_2) ?? 0;
        $count_level_3 = count($level_3) ?? 0;
        $total_level_1 = $count_level_1 * $referral_amount_level_1;
        $total_level_2 = $count_level_2 * $referral_amount_level_2;
        $total_level_3 = $count_level_3 * $referral_amount_level_3;
        $totalEarnings = $total_level_1 + $total_level_2 + $total_level_3;
        return $totalEarnings;
    }

    /**
     * Get user balance.
     *
     * @return float
     */
    public function getUserBalance($id)
    {
        $totalEarnings = $this->getUserTotalEarnings($id);

        $withdrawn = $this->getUserWithdrawnAmount($id);

        $payment_for_downline = $this->getUserPaymentForDownline($id);

        $withdrawn_amount = $withdrawn ?? 0;
        $payment_amount = $payment_for_downline ?? 0;

        $balance = ($totalEarnings - $withdrawn_amount) - $payment_amount;
        return $balance;
    }

    /**
     * Get user withdrawn amount.
     *
     * @return float
     */
    public function getUserWithdrawnAmount($id)
    {
        $withdrawn = DB::table('transactions')
                        ->where('transaction_type', self::TYPE_WITHDRAW)
                        ->where('user_id', $id)
                        ->sum('amount');
        $amount = $this->getTransactionRate($id,$withdrawn,self::TYPE_WITHDRAW);
        $withdrawn_amount = $amount ?? 0;
        return $withdrawn_amount;
    }


    /**
     * Get user payment for downline amount.
     *
     * @return float
     */
    public function getUserPaymentForDownline($id)
    {
        $payment = DB::table('transactions')
                        ->where('transaction_type', self::TYPE_PAY_FOR_DOWNLINE)
                        ->where('user_id', $id)
                        ->sum('amount');
        $amount = $this->getTransactionRate($id,$payment,self::TYPE_PAY_FOR_DOWNLINE);
        $payment_amount = $amount ?? 0;
        return $payment_amount;
    }

    /**
     * Get user system earnings.
     *
     * @return float
     */
    public function getSystemEarnings()
    {
        $earning = DB::table('transactions')
                        ->where('currency', 'TZS')
                        ->sum('fee');
        $earning_kes = DB::table('transactions')
                        ->where('currency', 'KES')
                        ->sum('fee');
        $earning_ugx = DB::table('transactions')
                        ->where('currency', 'UGX')
                        ->sum('fee');
        $earning_rwf = DB::table('transactions')
                        ->where('currency', 'RWF')
                        ->sum('fee');
        $earning_usd = DB::table('transactions')
                        ->where('currency', 'USD')
                        ->sum('fee');
        $balance_kes = $earning_kes / 0.05 ?? 0;
        $balance_ugx = $earning_ugx / 1.6 ?? 0;
        $balance_rwf = $earning_rwf / 0.44 ?? 0;
        $balance_usd = $earning_usd / 0.0004 ?? 0;
        $earning_amount = ($earning + $balance_kes + $balance_rwf + $balance_ugx + $balance_usd) ?? 0;
        return $earning_amount;
    }

    /**
     * Get user system earnings.
     *
     * @return float
     */
    public function getWithdrawRequests()
    {
        $withdraw_request = DB::table('transactions')
                                ->join('users','transactions.user_id','=','users.id')
                                ->select('transactions.*','users.username','users.name')
                                ->where('transaction_type',Transaction::TYPE_WITHDRAW)
                                ->where('status',Transaction::TRANSACTION_PENDING)
                                ->get();
                                
        $numRequest = count($withdraw_request) ?? 0;
        return $numRequest;
    }

    /**
     * Get whatsapp earnings.
     *
     * @return float
     */
    public function getWhatsAppEarnings($id)
    {
        $earning = DB::table('revenues')
                        ->where('type', Revenue::TYPE_WHATSAPP)
                        ->where('user_id', $id)
                        ->sum('amount');
        
        $withdrawals = $this->getUserWhatsAppWithdrawnAmount($id);
        $amount = $this->getRevenueRate($id,$earning,Revenue::TYPE_WHATSAPP);
        $earning_amount = $amount?? 0;
        $whatsapp_earning = $earning_amount - $withdrawals;
    
        return $whatsapp_earning;
    }

    public function getUserWhatsAppWithdrawnAmount($id)
    {
        $withdrawn = DB::table('transactions')
                        ->where('transaction_type', self::TYPE_WHATSAPP)
                        ->where('user_id', $id)
                        ->sum('amount');
        $amount = $this->getTransactionRate($id,$withdrawn,'TZS');
        $withdrawn_amount = $amount['amount'] ?? 0;
        return $withdrawn_amount;
    }

    /**
     * Get trivia question earnings.
     *
     * @return float
     */
    public function getQuestionsEarnings($id)
    {
        $earning = DB::table('revenues')
                        ->where('type', Revenue::TYPE_TRIVIA_QUESTION)
                        ->where('user_id', $id)
                        ->sum('amount');
        $amount = $this->getRevenueRate($id,$earning,Revenue::TYPE_TRIVIA_QUESTION);
        $earning_amount = $amount ?? 0;
        $withdrawals = $this->getUserQuestionsWithdrawnAmount($id);
        $questions_earning = $earning_amount - $withdrawals;
        return $questions_earning;
    }

    public function getUserQuestionsWithdrawnAmount($id)
    {
        $withdrawn = DB::table('transactions')
                        ->where('transaction_type', self::TYPE_QUESTIONS)
                        ->where('user_id', $id)
                        ->sum('amount');
        $amount = $this->getTransactionRate($id,$withdrawn,'TZS');
        $withdrawn_amount = $amount['amount'] ?? 0;
        return $withdrawn_amount;
    }

    /**
     * Get video earnings.
     *
     * @return float
     */
    public function getVideoEarnings($id)
    {
        $earning = DB::table('video_users')
                        ->where('type', Revenue::TYPE_VIDEO)
                        ->where('user_id', $id)
                        ->sum('amount');
        $amount = $this->getRevenueRate($id,$earning,Revenue::TYPE_VIDEO);
        $earning_amount = $amount ?? 0;
        $withdrawals = $this->getUserVideoWithdrawnAmount($id);
        $videos_earning = $earning_amount - $withdrawals;
        return $videos_earning;
    }

    public function getUserVideoWithdrawnAmount($id)
    {
        $withdrawn = DB::table('transactions')
                        ->where('transaction_type', self::TYPE_VIDEO)
                        ->where('user_id', $id)
                        ->sum('amount');
        $amount = $this->getTransactionRate($id, $withdrawn, 'TZS');
        $withdrawn_amount = $amount['amount'] ?? 0;
        return $withdrawn_amount;
    }

        /**
     * Get ADs earnings.
     *
     * @return float
     */
    public function getAdsEarnings($id)
    {
        $earning = DB::table('revenues')
                        ->where('type', Revenue::TYPE_ADCLICK)
                        ->where('user_id', $id)
                        ->sum('amount');
        $amount = $this->getRevenueRate($id,$earning,Revenue::TYPE_ADCLICK);
        $earning_amount = $amount ?? 0;
        $withdrawals = $this->getUserAdsWithdrawnAmount($id);
        $ads_earning = $earning_amount - $withdrawals;
        return $ads_earning;
    }

    public function getUserAdsWithdrawnAmount($id)
    {
        $withdrawn = DB::table('transactions')
                        ->where('transaction_type', self::TYPE_ADCLICK)
                        ->where('user_id', $id)
                        ->sum('amount');
        $amount = $this->getTransactionRate($id, $withdrawn,'TZS');
        $withdrawn_amount = $amount['amount'] ?? 0;
        return $withdrawn_amount;
    }

    /**
     * Get profit.
     *
     * @return float
     */
    public function getProfit($id)
    {
        $totalBalance = $this->getUserTotalEarnings($id);
        $whatsAppEarnings = $this->getWhatsAppEarnings($id);
        $questionsEarning = $this->getQuestionsEarnings($id);
        $videoEarnings = $this->getVideoEarnings($id);
        $adsEarnings = $this->getAdsEarnings($id);

        $profit_amount = $totalBalance + $whatsAppEarnings + $questionsEarning + $videoEarnings + $adsEarnings;
        return $profit_amount;
    }

    public function getExchangeRate($id, $amount, $currency)
    {
        $user = User::find($id);

        if($user->country == "tz") {
            $currency = $currency;
            $amount = $amount;
        } else if($user->country == "ke") {
            $currency = "KES";
            $amount = 0.05 * $amount;
        } else if($user->country == "ug") {
            $currency = "UGX";
            $amount = 1.6 * $amount;
        }  else if($user->country == "rw") {
            $currency = "RWF";
            $amount = 0.44 * $amount;
        } else {
            $currency = "USD";
            $amount = 0.0004 * $amount;
        }

        return array('currency' => $currency,'amount' => $amount);
    }

    public function getTransactionRate($id, $amount, $type)
    {
        $transactions = DB::table('transactions')
                        ->where('transaction_type', $type)
                        ->where('user_id', $id)
                        ->groupBy('transaction_type')
                        ->get();

        $user = User::find($id);
        $country_currency = '';

        foreach($transactions as $key=>$rows){
            if($user->country == "tz") {
                $country_currency = 'TZS';
            } else if($user->country == "ke") {
                $country_currency = "KES";
            } else if($user->country == "ug") {
                $country_currency = "UGX";
            }  else if($user->country == "rw") {
                $country_currency = "RWF";
            } else {
                $country_currency = "USD";
            }

            if($rows->currency == $country_currency) {
                
                $amount = $amount;
            } else {
                if($rows->currency == "TZS") {
                    if($user->country == "ke") {
                        $currency = "KES";
                        $amount = $amount * 0.05;
                    } else if($user->country == "ug"){
                        $currency = "UGX";
                        $amount = $amount * 1.6;
                    } else if($user->country == "rw"){
                        $currency = "RWF";
                        $amount = $amount * 0.44;
                    } else {
                        $currency = "USD";
                        $amount = $amount * 0.0004;
                    }
                    
                } else if($rows->currency == "KES") {
                    $currency = "TZS";
                    $amount =  $amount / 0.05;
                } else if($rows->currency == "UGX") {
                    $currency = "TZS";
                    $amount = $amount / 1.6;
                }  else if($rows->currency == "RWF") {
                    $currency = "TZS";
                    $amount = $amount / 0.44;
                } else {
                    $currency = "TZS";
                    $amount = $amount / 0.0004;
                }
            }
        }

        return $amount;
    }

    public function getRevenueRate($id, $amount, $type)
    {

        if($type == Revenue::TYPE_VIDEO) {
            $revenues = DB::table('video_users')
                        ->where('user_id', $id)
                        ->where('type', $type)
                        ->groupBy('type')
                        ->get();
        } else {
            $revenues = DB::table('revenues')
                        ->where('user_id', $id)
                        ->where('type', $type)
                        ->groupBy('type')
                        ->get();
        }

        $user = User::find($id);   

        foreach($revenues as $key=>$rows){
            if($rows->currency == $user->country) {
                $amount = $amount;
            } else {
                if($user->country == "tz") {
                    if($rows->currency == "ke") {
                        $currency = "TZS";
                        $amount = $amount / 0.05;
                    } else if($rows->currency == "ug"){
                        $currency = "TZS";
                        $amount = $amount / 1.6;
                    } else if($rows->currency == "rw"){
                        $currency = "TZS";
                        $amount = $amount / 0.44;
                    } else {
                        $amount = $amount / 0.0004;
                    }
                } else if($user->country == "ke") {
                    $currency = "KES";
                    $amount =  $amount * 0.05;
                } else if($user->country == "ug") {
                    $currency = "UGX";
                    $amount = $amount * 1.6;
                }  else if($user->country == "rw") {
                    $currency = "RWF";
                    $amount = $amount * 0.44;
                } else {
                    $currency = "USD";
                    $amount = $amount * 0.0004;
                }
            }
        }

        return $amount;
    }
}
