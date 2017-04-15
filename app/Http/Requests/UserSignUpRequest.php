<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSignUpRequest extends FormRequest
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
            'last_name'=>'required',
            'first_name'=>'required',
            'email'=>'required|unique:users',
            'zipcode'=>'numeric|max:9999|min:1000',
            'password'=>'required|confirmed',//confirmed helyett - same:password_confirmation
            'password_confirmation'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'last_name.required'=>'Nem adtad meg a vezetéknevedet!',
            'first_name.required'=>'Nem adtad meg a keresztnevedet!',
            'email.required'=>'Nem adtad meg az email címedet!',
            'email.unique'=>'Ezzel az email címmel már regisztráltak!',
            'zipcode.numeric'=>'Az írányítószám csak szám lehet!',
            'zipcode.max'=>'Az írányítószám nem lehet nagyobb mint :max',
            'zipcode.min'=>'Az írányítószám nem lehet kisebb mint :min',
            'password.required'=>'Nem adtál meg jelszót!',
            'password.confirmed'=>'A jelszavak nem egyeznek',
            'password_confirmation.required'=>'Nem adtad meg a jelszó ellenrzést!'
        ];
    }
}
