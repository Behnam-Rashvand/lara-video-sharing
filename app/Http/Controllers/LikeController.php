<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    
    public function store(Request $request , string $likeable_type , string $likeable_id){

        $model_name= 'App\\Models\\' . ucfirst($likeable_type);
        $routeKey = (new $model_name)->getRouteKeyName();
        $likeable = $model_name::where($routeKey , $likeable_id)->firstOrFail();

        $likeable->likes()->create([
            'user_id'=> auth()->id() ,
            'vote' => '1'
        ]);
        return back();
    }
}
