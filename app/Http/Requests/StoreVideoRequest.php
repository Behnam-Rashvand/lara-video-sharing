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
            'slug' => ['required' , 'unique:videos,slug', 'alpha_dash'],
            'category_id' => ['required' , 'exists:categories,id'],
            'file' => ['required' , 'file' , 'mimetypes:video/mp4' , 'max:3024']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug)
        ]);
    }

    public function messages(): array{
        return [
            'file.mimetypes' => 'فایل باید ویدیویی باشد' ,
        ];
    }
}
