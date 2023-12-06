<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
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
