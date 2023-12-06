<?php

namespace App\Http\Controllers;

use App\Models\Video;
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
        $request->validate([
            'name'=> ['required'] ,
            'length' => ['required' , 'integer'],
            'slug' => ['required' , 'unique:videos,slug'],
            'url' => ['required' , 'url'] ,
            'thumbnail' => ['required' , 'url']
        ]);
        Video::create($request->all());
        return to_route('home')->with('alert' , __('messages.success') );
    }
}
