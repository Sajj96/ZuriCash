<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdvertController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $ads = Advert::where('status', Advert::ADS_PUBLISHED)->get();
        $ads_ids = array();
        $ads_users = DB::table('advert_users')
                            ->select('ads_id')
                            ->where('user_id', $user->id)
                            ->get();
        
        foreach($ads_users as $key=>$rows) {
            array_push($ads_ids,$rows->ads_id);
        }

        return view('ads.ads_list', compact('user','ads','ads_ids'));
    }

    public function show()
    {
        return view('ads.create');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'   => 'required',
            'image'   => 'required|file',
            'image.*' => 'mimes:png,jpeg,gif,jpeg'
        ]);

        if($validator->fails()) {
            return redirect()->route('ads')->with('error','Only valid details are required!');
        }

        try {
            if($request->hasFile('image')) {
                $fileName = $request->image->getClientOriginalName();
                $extension = $request->file('image')->extension();
                $generated = uniqid()."_".time().date("Ymd")."_IMG";
                if($extension == "png") {
                    $fileName = $generated.".png";
                } else if($extension == "jpg") {
                    $fileName = $generated.".jpg";
                } else if($extension == "jpeg") {
                    $fileName = $generated.".jpeg";
                } else {
                    return redirect()->route('advert.show')->with('error', "Invalid file type only png, jpeg and jpg files are allowed.");
                }
                $filePath = $request->file('image')->storeAs('ads', $fileName,'public');
                $type = pathinfo($filePath, PATHINFO_EXTENSION);
                $image_data = File::get(storage_path('/app/public/ads/'.$fileName));
                $base64encodedString = 'data:image/' . $type . ';base64,' . base64_encode($image_data);
                $fileBin = file_get_contents($base64encodedString);
                $fileLink = url('storage/ads/'.$fileName);
            }

            $ads = new Advert;
            $ads->title = $request->title;
            $ads->description = $request->description;
            $ads->ads_path = $fileLink;
            $ads->status = $request->status;
            if($ads->save()) {
                return redirect()->route('advert.show')->with(['success' => 'You have successfully created an Advert']);
            }
        } catch (\Exception $e) {
            return redirect()->route('advert.show')->with('error',$e->getMessage());
        }
    }
}