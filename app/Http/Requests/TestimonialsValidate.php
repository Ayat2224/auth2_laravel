<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialsValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       $rules = [
            'name' => 'required|max:255',
            'description' => 'required',
            'position' => 'required',
            'photo' => 'required|mimes:jpeg,bmp,png,jpg',
        ];

        return $rules;
    }
}
