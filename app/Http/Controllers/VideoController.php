<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use App\Services\VideoService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Services\FFmpegAdapter;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{

    public function __construct( private VideoService $videoService )
    {}
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        $categories= Category::all();
        return view('videos.create', compact('categories'));
    }

    public function store(StoreVideoRequest $request)
    {
        $this->videoService->create($request->user() , $request->all());
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
        $this->videoService->update($video , $request->all());
        return to_route('videos.show' , $video)->with('alert' , __('messages.video_edit'));
    }

}
