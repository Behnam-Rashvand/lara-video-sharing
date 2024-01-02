<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    
    public function store(Request $request , string $likeable_type ,$likeable_id){

        $likeable_id->likes()->create([
            'user_id'=> auth()->id() ,
            'vote' => '1'
        ]);
        return back();
    }
}
