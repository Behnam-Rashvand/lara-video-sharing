<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    
    public function store(Request $request , string $likeable_type ,$likeable_id){

        $likeable_id->likedBy(auth()->user());
        return back();
    }
}
