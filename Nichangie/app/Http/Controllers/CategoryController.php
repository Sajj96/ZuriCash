<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.categories', compact('categories'));
    }

    public function show()
    {
        return view('admin.category.create');
    }

    public function getCategories()
    {
        return view('category.categories');
    }

    public function getCategoryCampaigns($name)
    {
        $category = Category::where('name',$name)->first();
        $campaigns = Story::where('category', $name)->get();
        return view('category.single-category', compact('category', 'campaigns'));
    }

    public function create(Request $request)
    {
        
    }
}
