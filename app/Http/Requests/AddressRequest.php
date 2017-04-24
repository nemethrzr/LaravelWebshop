<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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

    public function rules()
    {
        return [
            'shipping_zipcode'=>'required|max:9999|min:1000|numeric',
            'shipping_city'=>'required',
            'shipping_street'=>'required',
            'shipping_streetnumber'=>'numeric|max:999|min:1',
            'billing_zipcode'=>'required|max:9999|min:1000|numeric',
            'billing_city'=>'required',
            'billing_street'=>'required',
            'billing_streetnumber'=>'numeric|max:999|min:1',
            'type'=>'unique:addresses,type, user_id'            
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'shipping_zipcode.required'=>'Nem adtad meg a vezetéknevedet!',
            'first_name.required'=>'Nem adtad meg a keresztnevedet!',
            'email.required'=>'Nem adtad meg az email címedet!',
            'email.unique'=>'Ezzel az email címmel már regisztráltak!',
            'zipcode.numeric'=>'Az írányítószám csak szám lehet!',
            'zipcode.max'=>'Az írányítószám nem lehet nagyobb mint :max',
            'zipcode.min'=>'Az írányítószám nem lehet kisebb mint :min',
            'password.required'=>'Nem adtál meg jelszót!',
            'password.confirmed'=>'A jelszavak nem egyeznek',
            'password_confirmation.required'=>'Nem adtad meg a jelszó ellenrzést!',
            'type.unique'=>'Már megadtál egy címet'
        ];
    }
}
