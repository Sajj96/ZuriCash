<?php

namespace App\Http\Controllers;

use App\Models\AdvertUsers;
use Illuminate\Http\Request;

class AdvertUsersController extends Controller
{
    public function checkUser(Request $request)
    {
        $ads_user = AdvertUsers::where('ads_id', $request->ads_id)->where('user_id', $request->user_id)->count();
        return $ads_user;
    }
     
    public function create(Request $request)
    {

        try {

            $ads_user = new AdvertUsers;
            $ads_user->ads_id = $request->ads_id;
            $ads_user->user_id = $request->user_id;
            $ads_user->save();

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}