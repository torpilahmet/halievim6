<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
            'cart_id'               => 'numeric',
            'status'                => 'required|numeric',
            'payment_method'        => 'required|numeric',
            'invoice_method'        => 'required|numeric',
            'cargo_name'            => 'required',
            'cargo_address'         => 'required',
            'cargo_phone'           => 'required',
            'invoice_name'          => 'min:3',
            'invoice_address'       => 'min:5',
            'invoice_tax_no'        => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'cart_id'               => 'Sepet No',
            'status'                => 'Durum',
            'payment_method'        => 'Ödeme Şekli',
            'invoice_method'        => 'Kargo Fatura',
            'cargo_name'            => 'Kargo Adı',
            'cargo_address'         => 'Kargo Adresi',
            'cargo_phone'           => 'Kargo Telefon',
            'invoice_name'          => 'Fatura Adı',
            'invoice_address'       => 'Fatura Adresi',
            'invoice_tax_office'    => 'Vergi Dairesi',
            'invoice_tax_no'        => 'Vergi / TC Kimlik No',
        ];
    }
}
