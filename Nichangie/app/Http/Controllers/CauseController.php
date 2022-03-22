<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CauseController extends Controller
{
    public function index()
    {
        return view('cause.create-cause');
    }

    public function show($id)
    {
        $cause = Cause::find($id);
        return view('cause.single-cause', compact('cause'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'description' => 'required|string',
            'image'       => 'required',
            'category'    => 'required|string',
            'amount'      => 'required|numeric'
        ]);

        if($validator->fails()) {
            return redirect()->route('cause')->with('error','All details are required!');
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
                return redirect()->route('cause')->with('error', "Invalid file type only png, jpeg and jpg files are allowed.");
            }
            $filePath = $request->file('image')->storeAs('images', $fileName,'public');
            $type = pathinfo($filePath, PATHINFO_EXTENSION);
            $image_data = File::get(storage_path('/app/public/images/'.$fileName));
            $base64encodedString = 'data:image/' . $type . ';base64,' . base64_encode($image_data);
            $fileBin = file_get_contents($base64encodedString);

            $user = Auth::user();

            $cause = new Cause;
            $cause->user_id = $user->id;
            $cause->title = $request->title;
            $cause->description = strip_tags($request->description);
            $cause->media = $fileName;
            $cause->amount = $request->amount;
            $cause->category_id = $request->category;
            $cause->enddate = $request->enddate;
            if($cause->save()) {
                return redirect()->route('cause')->with('success','Cause created successfully!');
            }
            file_put_contents("/app/public/images/".$fileName, $fileBin);
        } catch (\Exception $e) {
            return redirect()->route('cause')->with('error','Something went wrong while creating a cause!');
        }
    }
}
