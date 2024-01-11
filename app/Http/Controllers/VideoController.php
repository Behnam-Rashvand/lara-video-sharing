<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use Illuminate\Support\Facades\Storage;

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
        $path= Storage::putFile('videos' , $request->file);
        $request->merge([
            'path' => $path
        ]);
        $request->user()->videos()->create($request->all());
        return to_route('home')->with('alert', __('messages.success'));
    }

    public function show(Video $video)
    {
        $video->load('comments.user');
        return view('videos.show' , compact('video'));
    }

    public function edit(Video $video)
    {
        $categories = Category::all();
        return view('videos.edit' , compact('video' , 'categories'));
    }

    public function update( UpdateVideoRequest $request , Video $video)
    {
        if($request->hasFile('file')){
            $path= Storage::putFile('videos' , $request->file);
            $request->merge([
                'path' => $path
            ]);
        }

        $video->update($request->all());
        return to_route('videos.show' , $video)->with('alert' , __('messages.video_edit'));
    }

}
