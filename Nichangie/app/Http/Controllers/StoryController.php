<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Rap2hpoutre\FastExcel\FastExcel;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;

class StoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $category_types = DB::table('category_types')->select('*')->get();
        return view('campaign.create-campaign', compact('categories', 'category_types'));
    }

    public function show($id)
    {
        $campaign = Story::find($id);
        $donations = DB::table('donations')
                            ->where('campaign_id', $id)
                            ->get();
        $total_donations = DB::table('donations')
                            ->where('campaign_id', $id)
                            ->sum('amount');
        $donation_percent = ($campaign->fundgoals > 0) ? ($total_donations/$campaign->fundgoals) * 100 : 0;
        $date = date('Y-m-d');
        $start = strtotime($date);
        $end = strtotime($campaign->deadline);

        $days_between = ceil(abs($end - $start) / 86400);
        $doners = count($donations);

        return view('campaign.single-campaign', compact('campaign','total_donations','donation_percent','days_between','doners','donations'));
    }

    public function getAll()
    {
        $campaigns = DB::table('stories')
                        ->join('users','stories.owner_id','=','users.id')
                        ->select('stories.*','users.name','users.lastname')
                        ->get();
        $type = 'Featured';
        $campaign_data = array();
        foreach($campaigns as $key=>$rows) {
            $donations = DB::table('donations')
                            ->where('campaign_id', $rows->id)
                            ->get();
            $total_donations = DB::table('donations')
                                ->where('campaign_id', $rows->id)
                                ->sum('amount');
            $total_donations = $total_donations ?? 0;
            $donation_percent = ($rows->fundgoals > 0) ? ($total_donations/$rows->fundgoals) * 100 : 0;
            $donation_array = (object) array(
                "total_donation"      => $total_donations,
                "donation_percentage" => $donation_percent,
                "doners"              => count($donations)
            );
            $campaign_data[] = (object) array_merge((array) $rows, (array) $donation_array);;
        }

        return view('campaign.campaigns', compact('campaign_data','type'));
    }

    public function getLatest()
    {
        $campaigns = DB::table('stories')
                        ->join('users','stories.owner_id','=','users.id')
                        ->select('stories.*','users.name','users.lastname')
                        ->orderByDesc('stories.id')
                        ->limit(20)
                        ->get();
        $type = 'Latest';
        $campaign_data = array();
        foreach($campaigns as $key=>$rows) {
            $donations = DB::table('donations')
                            ->where('campaign_id', $rows->id)
                            ->get();
            $total_donations = DB::table('donations')
                                ->where('campaign_id', $rows->id)
                                ->sum('amount');
            $donation_percent = ($rows->fundgoals > 0) ? ($total_donations/$rows->fundgoals) * 100 : 0;
            $donation_array = (object) array(
                "total_donation"      => $total_donations,
                "donation_percentage" => $donation_percent,
                "doners"              => count($donations)
            );
            $campaign_data[] = (object) array_merge((array) $rows, (array) $donation_array);;
        }

        return view('campaign.campaigns', compact('campaign_data','type'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'story'       => 'required|string',
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
            $fileLink = url('storage/images/'.$fileName);

            $user = Auth::user();

            $campaign = new Story;
            $campaign->owner_id = $user->id;
            $campaign->owner_phonenumber = $user->phonenumber;
            $campaign->owner_name = $user->lastname;
            $campaign->title = $request->title;
            $campaign->description = strip_tags($request->story);
            $campaign->link = $fileLink;
            $campaign->fundgoals = $request->amount;
            $campaign->category = $request->category;
            $campaign->deadline = $request->enddate;
            $campaign->status = Story::STATUS_INPROGRESS;
            if($campaign->save()) {
                return redirect()->route('campaign')->with('success','Campaign created successfully!');
            }
            file_put_contents("/app/public/images/".$fileName, $fileBin);
        } catch (\Exception $e) {
            return redirect()->route('campaign')->with('error','Something went wrong while creating a campaign!');
        }
    }

    public function storyLink($id)
    {
        $campaign = Story::find($id);
        if(!$campaign) {
            return response()->json(['error' => 'Sorry, campaign id maybe not be present!'], 422);
        }

        return response()->json(['link' => url('campaigns/'.$id)], 200);
    }

    public function getStories()
    {
        $user = Auth::user();
        $stories = Story::where('owner_id', $user->id)->get();
        $campaigns = DB::table('stories')
                        ->leftJoin('donations', 'stories.id','donations.campaign_id')
                        ->select('stories.*',DB::raw('SUM(donations.amount) as amount'))
                        ->where('stories.owner_id', $user->id)
                        ->orderBy('stories.id', 'DESC')
                        ->groupBy('stories.id')
                        ->get();
        return view('admin.campaigns.campaigns', compact('campaigns'));
    }

    public function exportCampaignData($id)
    {
        $user = Auth::user();
        $campaign = Story::find($id);
        $donations = DB::table('donations')
                        ->join('stories', 'donations.campaign_id','stories.id')
                        ->select('donations.*','stories.title')
                        ->where('stories.owner_id', $user->id)
                        ->where('donations.campaign_id', $id)
                        ->orderBy('donations.id', 'DESC')
                        ->get();
        $header_style = (new StyleBuilder())->setFontBold()->build();

        $rows_style = (new StyleBuilder())
            ->setFontSize(12)
            ->setBackgroundColor("EDEDED")
            ->build();   

        return (new FastExcel($donations))
        ->headerStyle($header_style)
        ->rowsStyle($rows_style)
        ->download('Donations for '.$campaign->title.'.xlsx', function($data){
            return [
                "Campaign Title"=> $data->title,
                "Donor Name"=> $data->name,
                "Donor Phone"=> $data->contact,
                "Amount Donated"=> $data->amount,
                "Date" => date('l, d Y',strtotime($data->created_at))
            ];
        });
    }

    public function close(Request $request)
    {
        try {
            $user = Auth::user();
            $campaign = Story::where('id',$request->campaign_id)->where('owner_id',$user->id)->first();
            $campaign->status = Story::STATUS_CANCELLED;
            $campaign->save();
            return redirect()->route('me.campaign')->with('success','Campaign was successfully closed.');
        } catch (\Exception $e) {
            return redirect()->route('me.campaign')->with('error','Something went wrong while closing a campaign!');
        }
    }
}
