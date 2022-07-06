<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;
use App\Services\SMSService;
use DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show the users page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::query();
            return Datatables::of($users)
                    ->addIndexColumn()
                    ->addColumn('referrer', function ($row) {
                        return $row->referrer->username ?? 'Not Specified';
                    })
                    ->addColumn('referrals', function ($row) {
                        return count($row->referrals)  ?? '0';
                    })
                    ->addColumn('joined', function ($row) {
                        return ($row->created_at)->format('M d Y');
                    })
                    ->addColumn('status', function ($row) {
                        if($row->active == 1){
                            return '<div class="badge badge-success badge-shadow">Active</div>';
                        } else {
                            return '<div class="badge badge-light badge-shadow">Inactive</div>';
                        }
                    })
                    ->addColumn('action', function($row){
                            $form_id = "activate-form$row->id";
                            return ($row->active == 0) ? '<button class="btn btn-success btn-action mr-1" data-class="'.$row->id.'">
                                    Activate
                                    </button>
                                    <form class="activate-form" data-id="'.$row->id.'" action="'.route("user.activate",$row->id).'" method="POST" class="d-none">
                                        <input type="hidden" name="_token" value="'.csrf_token().'">
                                    </form>
                                    <a href="'.route("user.details",$row->id).'" class="btn btn-outline-primary">Detail</a>' 
                                    : '<a href="'.route("user.details",$row->id).'" class="btn btn-outline-primary">Detail</a>';
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }

        return view('user.users');
    }

    /**
     * Show the user details page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser(Request $request, $id)
    {
        $user = User::find($id);
        $users = User::where('active',1)->lazy();
        $userObj = new User;
        $transaction = new Transaction();
        $transactions = Transaction::where('user_id', $user->id)->get();
        $profit = $transaction->getProfit($user->id);
        $balance = $transaction->getUserBalance($user->id);
        $level_1_downlines = $userObj->getLevelOneDownlines($user->id);
        $level_2_downlines = $userObj->getLevelTwoDownlines($user->id);
        $level_3_downlines = $userObj->getLevelThreeDownlines($user->id);

        $rate1 = $transaction->getExchangeRate($id,5000,'TZS');
        $rate2 = $transaction->getExchangeRate($id,3000,'TZS');
        $rate3 = $transaction->getExchangeRate($id,2000,'TZS');
        $amount_level_1 = $rate1['amount'];
        $amount_level_2 = $rate2['amount'];
        $amount_level_3 = $rate3['amount'];
        $currency = $rate1['currency'];

        return view('user.user_details', compact('user','users', 'transactions','profit','balance','level_1_downlines','level_2_downlines','level_3_downlines','currency','amount_level_1','amount_level_2','amount_level_3'));
    }

    /**
     * Show the profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfile()
    {
        $id = Auth::user()->id;
        $transactions = new Transaction();
        $profit = $transactions->getProfit($id);
        $balance = $transactions->getUserBalance($id);

        $rate = $transactions->getExchangeRate($id,$balance,'TZS');

        $currency = $rate['currency'];
        $amount = $rate['amount'];

        return view('profile', compact('profit','balance','currency','amount'));
    }

    /**
     * Edit user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfile(Request $request)
    {
        try {

            if(!empty($request->password)) {
                if(strlen($request->password) < 6) {
                    return redirect()->route('profile', $request->user_id)->with('error','Password must be at least 6 characters long!');
                }
            }

            $user = User::where('id', $request->user_id)->where('username', $request->username)->first();
            if($user) {
                $user->name = $request->name;
                $user->username = $request->username;
                $user->phone = $request->phone;
                $user->email = $request->email;
                if(!empty($request->password)) {
                    $user->password = Hash::make($request->password);
                }
                $user->country = $request->country;
                $user->referrer_id = $request->referrer;
                if($user->save()) {
                    return redirect()->route('user.details', $request->user_id)->with('success','User Profile updated successfully!');
                }
            } 
        } catch (\Exception $e) {
            return redirect()->route('user.details', $request->user_id)->with('error','Please provide unique details!');
        }
    }

    public function updateDetails(Request $request)
    {
        try {
            $user = Auth::user();

            if(!empty($request->password)) {
                if(strlen($request->password) < 6) {
                    return redirect()->route('profile', $request->user_id)->with('error','Password must be at least 6 characters long!');
                }
            }

            if($user) {
                $user->name = $request->name;
                $user->username = $request->username;
                $user->phone = $request->phone;
                $user->email = $request->email;
                if(!empty($request->password)) {
                    $user->password = Hash::make($request->password);
                }
                $user->country = $request->country;
                if($user->save()) {
                    return redirect()->route('profile', $request->user_id)->with('success','Profile updated successfully!');
                }
            } 
        } catch (\Exception $e) {
            return redirect()->route('profile', $request->user_id)->with('error','Please provide unique details!');
        }  
    }

    public function activateUser(Request $request, $id)
    {
        try {
            $message = "Hongera, akaunti yako ya ZURICASH sasa imewezeshwa. \n\n\n";
            $message .= "Congratulations, your ZURICASH Account is now activated.";

            $user = User::where('id',$id)->first();
            $user->active = User::USER_STATUS_ACTIVE;
            if($user->save()) {
                $phone = str_replace('+','',$user->phone);
                $sms = app(SMSService::class);
                $response = $sms->registration($phone, $message);
                return redirect()->route('users')->with('success','User activated successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->route('users')->with('error',$e->getMessage());
        }
    }

    public function deactivateUser(Request $request, $id)
    {
        try {
            $user = User::where('id',$id)->first();
            $user->active = User::USER_STATUS_BLOCKED;
            if($user->save()) {
                return redirect()->route('user.details', $id)->with('success','User deactivated successfully!');
            }
        } catch (\Exception $th) {
            return redirect()->route('user.details', $id)->with('error','User was not deactivated');
        }
    }

    public function deleteUser(Request $request, $id)
    {
        try {
            $user = User::where('id',$id)->first();
            if($user->delete()) {
                return redirect()->route('users')->with('success','User deleted successfully!');
            }
        } catch (\Exception $th) {
            return redirect()->route('users')->with('error','User was not deleted');
        }
    }
}
