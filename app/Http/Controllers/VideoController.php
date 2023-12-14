<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{

    public function index()
    {
        return 'video Controller page';
    }

    public function create()
    {
        $categories= Category::all();
        return view('videos.create', compact('categories'));
    }

    public function store(StoreVideoRequest $request)
    {
        Video::create($request->all());
        return to_route('home')->with('alert', __('messages.success'));
    }

    public function show(Video $video)
    {
        return view('videos.show' , compact('video'));
    }

    public function edit(Video $video)
    {
        return view('videos.edit' , compact('video'));
    }

    public function update(UpdateVideoRequest $request , Video $video)
    {
        $video->update($request->all());
        return to_route('videos.show' , $video)->with('alert' , __('messages.video_edit'));
    }

}
