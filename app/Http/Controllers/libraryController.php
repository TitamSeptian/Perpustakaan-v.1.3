<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class libraryController extends Controller
{
    public function index()
    {
    	return view('pages.library');
    }

    public function about()
    {
    	return view('pages.about');
    }
}
