<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return view('education.lessons');
    }

    public function show()
    {
        return view('education.create');
    }
}
