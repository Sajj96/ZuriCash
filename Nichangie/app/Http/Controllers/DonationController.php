<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'donate_amount'  => 'required|numeric',
            'payment_method' => 'required|string'
        ]);

        if($validator->fails()) {
            return redirect()->route('campaign.show', $request->campaign_id)->with('error','Some required details are missing!');
        }

        try {
            $donation = new Donation;
            $donation->campaign_id = $request->campaign_id;
            $donation->name = $request->name;
            $donation->email = $request->email;
            $donation->contact = $request->contact;
            $donation->category_id = $request->category_id;
            $donation->payment_method = $request->payment_method;
            $donation->amount = $request->donate_amount;
            if($donation->save()) {
                return redirect()->route('campaign.show', $request->campaign_id)->with('success','Donation is sent. Thank you for your donation!');
            }
        } catch (\Exception $e) {
            return redirect()->route('campaign.show', $request->campaign_id)->with('error',$e->getMessage());
        }
    }
}
