<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TargCredStoreRe extends FormRequest
{

    public function response(array $errors){
        return \Redirect::back()->withErrors($errors)->withInput();
    }
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
            //
            'clave' => 'required',
            'expi' => 'required',
            'num_tar' => 'required|unique:cli_m_pago'
        ];
    }

    public function messages()
    {
        return [
            'clave.required' => 'Es necesario ingresar la clave de la tarjeta',
            'expi.required' => 'Es necesario la fecha de expiracion',
            'num_tar.required' => 'Es necesario ingresar una trajeta de credito o debito'
        ];
    }
}
