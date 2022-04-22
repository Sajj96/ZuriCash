<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function getAll()
    {
        return view('category.categories');
    }

    public function create(Request $request)
    {
        
    }
}
