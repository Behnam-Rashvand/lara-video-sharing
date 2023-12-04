<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;


    public function length(): Attribute
    {
        return Attribute::make(
            get: fn ( int $value ) => gmdate('H:i',$value) ,
        );
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => verta($value)->formatDifference(),
        );
    }
}
