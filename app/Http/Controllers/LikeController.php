<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    
    public function store(Video $video){

        $video->likes()->create([
            'user_id'=> auth()->id() ,
            'vote' => '1'
        ]);

        return back();
    }
}
