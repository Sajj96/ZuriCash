<?php

namespace App\Http\Controllers;

use App\Models\VideoAndAds;
use App\Models\VideoUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class VideoAndAdsController extends Controller
{
     /**
     * Show the videos page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $videos = VideoAndAds::where('status', VideoAndAds::VIDEO_PUBLISHED)->get();
        $video_ids = array();
        $video_users = DB::table('video_users')
                            ->select('video_id')
                            ->where('user_id', $user->id)
                            ->get();
        
        foreach($video_users as $key=>$rows) {
            array_push($video_ids,$rows->video_id);
        }

        return view('video.videos', compact('user','videos','video_ids'));
    }

    public function getList()
    {
        $videos = VideoAndAds::all();
        $serial = 1;
        return view('video.video_list', compact('videos', 'serial'));
    }

    /**
     * Show the video upload page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('video.upload');
    }

    /**
     * Upload video.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string'
        ]);

        if($validator->fails()) {
            return redirect()->route('video.show')->with('error','Only valid details are required!');
        }
        // dd($request->file('video')->getClientOriginalName());
        try {

            $videoFile = $request->file('video')->getClientOriginalName();
            $extension = $request->file('video')->getClientOriginalExtension();
            $generated_name = uniqid()."_".time().date("Ymd")."_VIDEO";
            if($extension == "mp4") {
                $videoFile = $generated_name.".mp4";
            } else {
                return redirect()->route('video.show')->with('error', "Invalid file type only mp4 files are allowed.");
            }
            $videoPath = $request->file('video')->storeAs('videos', $videoFile,'public');
            $type_video = pathinfo($videoPath, PATHINFO_EXTENSION);
            $video_data = File::get(storage_path('/app/public/videos/'.$videoFile));

            if($request->file('poster') != "") {
                $fileName = $request->file('poster')->getClientOriginalName();
                $extension = $request->file('poster')->extension();
                $generated = uniqid()."_".time().date("Ymd")."_IMG";
                if($extension == "png") {
                    $fileName = $generated.".png";
                } else if($extension == "jpg") {
                    $fileName = $generated.".jpg";
                } else if($extension == "jpeg") {
                    $fileName = $generated.".jpeg";
                } else {
                    return redirect()->route('video.show')->with('error', "Invalid file type only png, jpeg and jpg files are allowed.");
                }
                $filePath = $request->file('poster')->storeAs('video_posters', $fileName,'public');
                $type = pathinfo($filePath, PATHINFO_EXTENSION);
                $image_data = File::get(storage_path('/app/public/video_posters/'.$fileName));
                $base64encodedString = 'data:image/' . $type . ';base64,' . base64_encode($image_data);
                $fileBin = file_get_contents($base64encodedString);
            } else {
                $fileName = "";
            }

            $video = new VideoAndAds;
            $video->video = $videoFile;
            $video->title = $request->title;
            $video->poster = $fileName;
            $video->status = $request->status;
            if($video->save()) {
                return redirect()->route('video.show')->with('success','You have successfully uploaded the video!');
            }
            file_put_contents("/app/public/video_posters/".$fileName, $fileBin);

        } catch (\Exception $e) {
            return redirect()->route('video.show')->with('error',$e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $video = VideoAndAds::find($request->id);
            if($video->delete()){
                return redirect()->route('video.list')->with('success','Video deleted successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->route('video.list')->with('error','Something went wrong while deleting a question!');
        }
    }
}
