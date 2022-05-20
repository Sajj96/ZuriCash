<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Services\PaymentService;
use App\Services\SMSService;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
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

        if ($validator->fails()) {
            return redirect()->route('verify.phone')->with('error', 'All details are required!');
        }

        try {
            $otp = $request->first . $request->second . $request->third . $request->fourth;
            $session_otp = (int)$request->session()->get('session_otp');
            $mobile_number = $request->session()->get('mobile_number');

            $otp = (int)$otp;

            if ($otp == $session_otp) {
                $request->session()->forget('session_otp');
                $user = User::where('phonenumber', $mobile_number)->first();
                $user->status = User::USER_ACTIVE;
                $user->save();
                return redirect()->route('login')->with('success', 'Phone number verified successfully. Please login');
            } else {
                return redirect()->route('verify.phone')->with('error', 'Wrong verification code');
            }
        } catch (\Exception $e) {
            return redirect()->route('verify.phone')->with('error', $e->getMessage());
        }
    }

    public function verifyTest()
    {
        $characters = '123456789';
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < 13; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }

        $phone = '255659608434';
        $smsOpt = app(PaymentService::class);
        $response = $smsOpt->ussdPush($phone, 1000, $string)->getData();
        echo json_encode($response);
        // // $manage = json_encode($response);
        // $manage = $response->header;
        // echo $manage;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required_if:user_type,2|string|email|max:255|unique:users',
            'phonenumber' => 'required|string|unique:users|min:10',
            'idtype' => 'required|string|max:255',
            'idlink' => 'required',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Only valid details are required'], 422);
        }

        try {

            $user               = new User;
            $user->name         = $request->name;
            $user->lastname     = $request->lastname;
            $user->location     = $request->location;
            $user->email        = $request->email;
            $user->idtype       = $request->idtype;
            $user->idlink       = $request->idlink;
            $user->district     = $request->district;
            $user->city         = $request->city;
            $user->phonenumber  = str_replace('+', '', $request->phonenumber);
            $user->password     = Hash::make($request->password);
            $user->status       = User::USER_INACTIVE;
            $user->user_type    = User::DONEE_USER_TYPE;
            if ($user->save()) {
                return response()->json([
                    'success' => 'User created successfully',
                    'User'    => $user
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Action failed'], 500);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phonenumber'    => 'required|string',
            'password'  => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Valid mobile and password are required'], 422);
        }

        try {
            $user = User::where('phonenumber', $request->phonenumber)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                return response()->json([
                    'success' => 'Success login',
                    'user'    => $user
                ], 200);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Action failed'], 500);
        }
    }
}
