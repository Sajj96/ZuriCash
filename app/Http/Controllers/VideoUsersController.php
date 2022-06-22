<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use App\Models\Transaction;
use App\Models\User;
use App\Models\VideoUsers;
use Illuminate\Http\Request;

class VideoUsersController extends Controller
{

    public function checkUser(Request $request)
    {
        $video_user = VideoUsers::where('video_id', $request->video_id)->where('user_id', $request->user_id)->count();
        return $video_user;
    }
     
    public function create(Request $request)
    {

        try {

            $transaction = new Transaction;

            $rate = $transaction->getExchangeRate($request->user_id,$request->amount,'TZS');
            $amount = $rate['amount'];

            $user = User::find($request->user_id);

            $video_user = new VideoUsers;
            $video_user->video_id = $request->video_id;
            $video_user->user_id = $request->user_id;
            $video_user->type = $request->type;
            $video_user->amount = $amount;
            $video_user->currency = $user->country;
            $video_user->status = Revenue::STATUS_PAID;
            $video_user->save();
            return true;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
