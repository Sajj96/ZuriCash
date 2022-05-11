<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.all_testimonials', compact('testimonials'));
    }

    public function show()
    {
        return view('admin.testimonials.testimonials');
    }

    public function create(Request $request)
    {
        try {
            $testimonial = new Testimonial;
            $testimonial->name = $request->name;
            $testimonial->title = $request->title;
            $testimonial->description = $request->story;
            if($testimonial->save()) {
                return redirect()->route('testimonial.show')->with('success','Testimonial added successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->route('testimonial.show')->with('error','Something went wrong');
        }
    }

    public function delete(Request $request)
    {
        try {
            $testimonial = Testimonial::find($request->id);
            if($testimonial->delete()) {
                return redirect()->route('testimonial')->with('success','Testimonial deleted successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->route('testimonial')->with('error','Something went wrong');
        }
    }
}
