<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'payment_type_id'=>'required|numeric',
            'shipping_method_id'=>'required|numeric',
            'billing_address_id'=>'required|numeric',
            'shipping_address_id'=>'required|numeric'                
        ];
    }
    public function messages(){
        return [
        'payment_type_id.required'=>'Kérlek válassz egy fizetési lehetőségek közül',
        'shipping_method_id.required'=>'Kérlek válassz a szállítási lehetőségek közül',
        'billing_address_id.required'=>'Nem válaszottad ki a számlázási címet',
        'shipping_address_id.required'=>'Nem válaszottad ki a szállítási címet',
        ];
    }
}
