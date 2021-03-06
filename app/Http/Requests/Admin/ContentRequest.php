<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
        return [
            'menu'=>'required',
            'slug'=>'unique:contents',
            'description'=>'required'
        ];
    }
    public function messages($value='')
    {
        return [
            'menu.required'=>'Nem adtad meg a menü nevét',
            'description.required'=>'Nem lehet üres a tartalmi rész'
        ];
    }
}
