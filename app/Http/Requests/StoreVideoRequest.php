<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> ['required'] ,
            'length' => ['required' , 'integer'],
            'slug' => ['required' , 'unique:videos,slug', 'alpha_dash'],
            'url' => ['required' , 'url'] ,
            'thumbnail' => ['required' , 'url'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug)
        ]);
    }
}
