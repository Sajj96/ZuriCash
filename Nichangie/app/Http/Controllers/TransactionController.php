<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->user_type != 2) {
            $transactions = DB::table('transactions')
                ->join('users', 'transactions.user_id', 'users.id')
                ->leftJoin('stories', 'transactions.campaign', 'stories.id')
                ->select('transactions.*', 'users.name', 'users.lastname', 'stories.title', 'stories.id as camp_id')
                ->where('transactions.user_id', $user->id)
                ->get();
            return view('admin.transactions.transaction', compact('transactions'));
        }
        return view('admin.transactions.transaction');
    }

    public function withdraw(Request $request)
    {
        $user = Auth::user();
        $transaction = new Transaction;

        if (!empty($request->id)) {
            $campaign = DB::table('stories')
                ->leftJoin('donations', 'stories.id', 'donations.campaign_id')
                ->select('stories.id', 'stories.title', 'stories.fundgoals', 'stories.deadline', 'stories.status', 'stories.description', DB::raw('SUM(donations.amount) as amount'))
                ->where('stories.owner_id', $user->id)
                ->where('stories.id', $request->id)
                ->groupBy('stories.id', 'stories.title', 'stories.fundgoals', 'stories.deadline', 'stories.status', 'stories.description')
                ->first();

            $balance = $transaction->campaignBalance($request->id, $user->id);
            return view('admin.transactions.withdraw', compact('campaign', 'balance'));
        }

        $balance = $transaction->userBalance($user->id);
        return view('admin.transactions.withdraw', compact('balance'));
    }

    public function requestWithdraw(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount'         => 'required|numeric',
            'payment_method' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('transaction.withdraw')->with('error', 'Amount and Payment Method are required!');
        }

        try {

            $transaction = new Transaction;

            $user = Auth::user();
            if (!empty($request->campaign_id)) {
                $balance = $transaction->campaignBalance($request->campaign_id, $user->id);

                if ($request->amount > $balance) {
                    return redirect()->route('transaction.withdraw')->with('error', 'Sorry you don\'t have enough balance in this campaign to withdraw ' . $request->amount . '!');
                }
            }

            $balance = $transaction->userBalance($user->id);

            if ($request->amount > $balance) {
                return redirect()->route('transaction.withdraw')->with('error', 'Sorry you don\'t have enough balance to withdraw ' . $request->amount . '!');
            }

            $fileName = '';
            if (!empty($request->invoice)) {
                $fileName = $request->invoice->getClientOriginalName();
                $extension = $request->file('invoice')->extension();
                $generated = uniqid() . "_" . time() . date("Ymd") . $extension;
                $fileName = $generated;
                $filePath = $request->file('invoice')->storeAs('invoices', $fileName, 'public');
                $type = pathinfo($filePath, PATHINFO_EXTENSION);
            }

            $transaction->user_id = $user->id;
            $transaction->campaign = (!empty($request->campaign_id)) ? $request->campaign_id : 0;
            $transaction->amount = $request->amount;
            $transaction->debit = $request->debit;
            $transaction->payment_method = $request->payment_method;
            $transaction->phone = $request->phone;
            $transaction->account_name = $request->account_name;
            $transaction->account_number = $request->account_number;
            $transaction->bank_name = $request->bank_name;
            $transaction->branch_name = $request->branch_name;
            $transaction->invoice = $fileName;
            $transaction->supplier_contacts = $request->supplier_contacts;
            $transaction->status = Transaction::PAYMENT_INPROGRESS;
            if ($transaction->save()) {
                return redirect()->route('transaction.withdraw')->with('success', 'Withdraw request is submitted successfully. Please wait for confirmation.');
            }
        } catch (\Exception $e) {
            return redirect()->route('transaction.withdraw')->with('error', 'Something went wrong while requesting withdraw!');
        }
    }
}
