<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
   
    public function index()
    {
        return 'video Controller page';
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        return $request;
    }
}
