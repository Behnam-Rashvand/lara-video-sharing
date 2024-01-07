<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DislikeController extends Controller
{
    public function store(Request $request , string $likeable_type ,$likeable_id){

        $likeable_id->likes()->create([
            'user_id'=> auth()->id() ,
            'vote' => '-1'
        ]);
        return back();
    }
}
