<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect()->back()
            ->withInput()
            ->withErrors([
                'email' => 'Incorrect Email or Password',
                'password' => 'Incorrect Password'
            ]);
    }

    public function showDoner()
    {
        return view('auth.register_doner');
    }

    public function showDonee()
    {
        return view('auth.register_donee');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required_if:user_type,2', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users','min:10',],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $user = User::where('phone',$request->phone)->first();
            if($user) {
                if($request->user_type == User::DONEE_USER_TYPE) {
                    return redirect()->route('register.donee')->with('error','Account exists, login instead');
                }else if($request->user_type == User::DONER_USER_TYPE) {
                    return redirect()->route('register.doner')->with('error','Account exists, login instead');
                }
            }

            $user               = new User;
            $user->firstname    = $request->firstname;
            $user->lastname     = $request->lastname;
            $user->address      = $request->address;
            $user->town         = $request->town_city;
            $user->email        = $request->email;
            $user->phone        = $request->phone;
            $user->password     = Hash::make($request->password);
            $user->user_type    = $request->user_type;
            if($user->save()) {
                if($request->user_type == User::DONEE_USER_TYPE) {
                    return redirect()->route('register.donee')->with('success','You successfully registered!');
                }else if($request->user_type == User::DONER_USER_TYPE) {
                    return redirect()->route('register.doner')->with('success','You successfully registered!');
                }
            }
        } catch (\Exception $e) {
            if($request->user_type == User::DONEE_USER_TYPE) {
                return redirect()->route('register.donee')->with('error','There was a problem in registration!');
            }else if($request->user_type == User::DONER_USER_TYPE) {
                return redirect()->route('register.doner')->with('error','There was a problem in registration!');
            }
        }
    }
}
