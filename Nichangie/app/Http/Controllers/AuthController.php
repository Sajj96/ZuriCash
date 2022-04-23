<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Services\SMSService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function verify(Request $request)
    {
        $phone = $request->session()->get('mobile_number');
        return view('auth.verify', compact('phone'));
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first'  => 'required|integer',
            'second' => 'required|integer',
            'third'  => 'required|integer',
            'fourth' => 'required|integer'
        ]);

        if($validator->fails()) {
            return redirect()->route('verify.phone')->with('error','All details are required!');
        }

        try {
            $otp = $request->first.$request->second.$request->third.$request->fourth;
            $session_otp = (int)$request->session()->get('session_otp');
            $mobile_number = $request->session()->get('mobile_number');
           
            $otp = (int)$otp;

            if($otp == $session_otp) {
                $request->session()->forget('session_otp');
                $user = User::where('phonenumber', $mobile_number)->first();
                $user->status = User::USER_ACTIVE;
                $user->save();
                return redirect()->route('login')->with('success','Phone number verified successfully. Please login');
            } else {
                return redirect()->route('verify.phone')->with('error', 'Wrong verification code');
            }
            
        } catch (\Exception $e) {
            return redirect()->route('verify.phone')->with('error', $e->getMessage());
        }
    }

    public function verifyTest()
    {
        $phone = '255682565281';
        $smsOpt = app(SMSService::class);
        $smsOpt->sendOtp($phone);
    }
}
