<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVideoRequest extends StoreVideoRequest
{

    public function rules(): array
    {
        return array_merge(parent::rules() ,[
            'slug' => ['required' , Rule::unique('videos')->ignore($this->video) , 'alpha_dash'],
            'file' => ['nullable' , 'file' , 'mimetypes:video/mp4' , 'max:3024'] ,
        ]);
    }
}
