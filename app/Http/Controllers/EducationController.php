<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return view('education.lessons');
    }

    public function show()
    {
        $education = Education::all();
        return view('education.create', compact('education'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'   => 'required|string',
            'link'   => 'required|string'
        ]);

        if($validator->fails()) {
            return redirect()->route('education.show')->with('error','Only valid details are required!');
        }

        try {
            $education = new Education;
            $education->title = $request->title;
            $education->link = $request->link;
            if($education->save()){
                return redirect()->route('education.show')->with('success','Link added successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->route('education.show')->with('error','Something went wrong!');
        }
    }
}
