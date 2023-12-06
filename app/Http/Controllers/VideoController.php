<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
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
}
