<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TeacherValidate extends FormRequest
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
       return 
            $rules = [
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'address' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg',
            'facebook' => 'required|max:255',
            'twitter' => 'required|max:255',
            'linkedin' => 'required|max:255',
            'skype' => 'required|max:255'

        ];

 

        return $rules;
    }
}
