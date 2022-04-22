<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CampaignController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $category_types = DB::table('category_types')->select('*')->get();
        return view('campaign.create-campaign', compact('categories', 'category_types'));
    }

    public function show($id)
    {
        $campaign = Campaign::find($id);
        $donations = DB::table('donations')
                            ->where('campaign_id', $id)
                            ->get();
        $total_donations = DB::table('donations')
                            ->where('campaign_id', $id)
                            ->sum('fundgoals');
        $donation_percent = ($total_donations/$campaign->fundgoals) * 100;
        $date = date('Y-m-d');
        $start = strtotime($date);
        $end = strtotime($campaign->deadline);

        $days_between = ceil(abs($end - $start) / 86400);
        return view('campaign.single-campaign', compact('campaign','total_donations','donation_percent','days_between'));
    }

    public function getAll()
    {
        $campaigns = DB::table('stories')
                        ->join('users','stories.owner_id','=','users.id')
                        ->select('stories.*','users.name','users.lastname')
                        ->get();
        return view('campaign.campaigns', compact('campaigns'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'story' => 'required|string',
            'image'       => 'required',
            'category'    => 'required|string',
            'amount'      => 'required|numeric'
        ]);

        if($validator->fails()) {
            return redirect()->route('campaign')->with('error','All details are required!');
        }

        try {
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
                return redirect()->route('campaign')->with('error', "Invalid file type only png, jpeg and jpg files are allowed.");
            }
            $filePath = $request->file('image')->storeAs('images', $fileName,'public');
            $type = pathinfo($filePath, PATHINFO_EXTENSION);
            $image_data = File::get(storage_path('/app/public/images/'.$fileName));
            $base64encodedString = 'data:image/' . $type . ';base64,' . base64_encode($image_data);
            $fileBin = file_get_contents($base64encodedString);
            $fileLink = env('APP_URL').'/public/images/'.$fileName;

            $user = Auth::user();

            $campaign = new Campaign;
            $campaign->owner_id = $user->id;
            $campaign->title = $request->title;
            $campaign->description = strip_tags($request->story);
            $campaign->link = $fileLink;
            $campaign->fundgoals = $request->amount;
            $campaign->category_id = $request->category;
            $campaign->deadline = $request->enddate;
            $campaign->type  = $request->type;
            $campaign->status = Campaign::STATUS_INPROGRESS;
            if($campaign->save()) {
                return redirect()->route('campaign')->with('success','Campaign created successfully!');
            }
            file_put_contents("/app/public/images/".$fileName, $fileBin);
        } catch (\Exception $e) {
            return redirect()->route('campaign')->with('error','Something went wrong while creating a campaign!');
        }
    }
}
