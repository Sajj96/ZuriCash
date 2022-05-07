<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    public function requestWithdraw(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount'         => 'required|numeric',
            'payment_method' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->route('transaction.withdraw')->with('error','Amount and Payment Method are required!');
        }

        try {
            $transaction = new Transaction;
            $transaction->amount = $request->amount;
            $transaction->payment_method = $request->payment_method;
            $transaction->phone = $request->phone;
            $transaction->account_name = $request->account_name;
            $transaction->account_number = $request->account_number;
            $transaction->bank_name = $request->bank_name;
            $transaction->branch_name = $request->branch_name;
            $transaction->invoice = $request->invoice;
            $transaction->supplier_contacts = $request->supplier_contacts;
            if($transaction->save()) {
                return redirect()->route('transaction.withdraw')->with('success','Withdraw request is submitted successfully. Please wait for confirmation.');
            }
        } catch (\Exception $e) {
            return redirect()->route('transaction.withdraw')->with('error','Something went wrong while requesting withdraw!');
        }
    }
}
