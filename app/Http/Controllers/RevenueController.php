<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use App\Models\VideoUsers;
use App\Models\Screenshot;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index()
    {
        return view('revenue');
    }

    /**
     * Add revenue.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {

            $transaction = new Transaction;

            $rate = $transaction->getExchangeRate($request->user_id,$request->amount,'TZS');
            $amount = $rate['amount'];

            $user = User::find($request->user_id);

            $revenue = new Revenue;
            $revenue->user_id = $request->user_id;
            $revenue->type = $request->type;
            $revenue->amount = $amount;
            $revenue->currency = $user->country;
            $revenue->status = Revenue::STATUS_PAID;
            if ($revenue->save()) {
                if ($request->type == Revenue::TYPE_WHATSAPP) {
                    $screenshot = Screenshot::find($request->id);
                    $screenshot->status = Screenshot::SCREENSHOT_PAID;
                    $screenshot->save();
                    return redirect()->route('screenshot.list')->with('success', 'Revenue added successfully!');
                }
                return redirect()->route('revenue')->with('success', 'Revenue added successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->route('revenue')->with('error', 'Something went wrong while adding revenue!');
        }
    }

    public function createBulk(Request $request)
    {
        try {
            $date = date('Y-m-d');
            $screenshots = Screenshot::where('status', 0)
                ->where('created_at', 'like', '%' . $date . '%')
                ->where('status', Screenshot::SCREENSHOT_PENDING)
                ->get();

            $transaction = new Transaction;

            foreach ($screenshots as $key => $rows) {
                $rate = $transaction->getExchangeRate($rows->user_id,$request->amount,'TZS');
                $amount = $rate['amount'];
                $user = User::find($request->user_id);

                $revenue = new Revenue;
                $revenue->user_id = $rows->user_id;
                $revenue->type = Revenue::TYPE_WHATSAPP;
                $revenue->amount = $amount;
                $revenue->currency = $user->country;
                $revenue->status = Revenue::STATUS_PAID;
                if ($revenue->save()) {
                    $screenshot = Screenshot::find($rows->id);
                    $screenshot->status = Screenshot::SCREENSHOT_PAID;
                    $screenshot->save();
                }
            }
            return redirect()->route('screenshot.list')->with('success', 'Revenue added successfully!');
        } catch (\Exception $e) {
            return redirect()->route('revenue')->with('error', 'Something went wrong while adding revenue!');
        }
    }
}
