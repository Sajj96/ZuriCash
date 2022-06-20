<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    public function index()
    {
        $education = Education::all();
        return view('education.lessons', compact('education'));
    }

    public function show()
    {
        return view('education.create');
    }

    public function getList()
    {
        $lessons = Education::all();
        return view('education.lessons-list', compact('lessons'));
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

    public function edit($id)
    {
        $education = Education::find($id);
        return view('education.edit', compact('education'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'   => 'required|string',
            'link'   => 'required|string'
        ]);

        if($validator->fails()) {
            return redirect()->route('education.edit', $request->id)->with('error','Only valid details are required!');
        }

        try {
            $education = Education::where('id', $request->id)->first();
            $education->title = $request->title;
            $education->link = $request->link;
            if($education->save()) {
                return redirect()->route('education.list')->with('success','Lesson updated successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('education.edit', $request->id)->with('error','Something went wrong while updating lesson!');
        }
    }

    public function delete(Request $request)
    {
        try {
            $education = Education::find($request->id);
            if($education->delete()){
                return redirect()->route('education.list')->with('success','Lesson deleted successfully');
            }
        } catch (\Exception $e) {
            return redirect()->route('education.show')->with('error','Something went wrong while deleting a question!');
        }
    }
}
