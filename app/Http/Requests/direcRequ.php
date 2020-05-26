<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class direcRequ extends FormRequest
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
            //
            'alias' => 'required|string|max:15|min:3',
            'calle' => 'required|max:75',
            'NumEI' => 'required|regex:/[\d]{2,4}\s[a-zA-Z]{1}/',
            'estado' => 'required',
            'ciudad' => 'required|regex:/[a-zA-Z áéíóúÁÉÍÓÚñÑ]/',
            'CP' => 'required|regex:/[\d]{4,5}/',
            'colonia' => 'required|regex:/[a-zA-Z áéíóúÁÉÍÓÚñÑ]/',
            'MuDe' => 'required|regex:/[a-zA-Z áéíóúÁÉÍÓÚñÑ]/'
        ];
    }

    public function messages()
    {
        return [
            'alias.required' => 'Es necesario que ingrese un alias para manejar sus direciones mas facil',
            'alias.min' => 'Ingrese un alias mayor a 4 caracteres',
            'alias.max' => 'Ingrese un alias facil de recordar y que sea menor a 15 caracteres',
            'calle.required' => 'Es necesario que ingrese la calle para enviar los productos ',
            'NumEI.required' => 'Es necesario que ingrese el numero Exterior e interior',
            'NumEI.regex' => 'El formato ingresado no esta permitido, si no tiene numero coloque 00 A',
            'estado.required' => 'Es necesario que selecione un estado',
            'ciudad.required' => 'Es necesario que ingrese la ciudad',
            'ciudad.regex' => 'Solo se permiten letras',
            'CP.required' => 'Es muy necesario que ingrese el codigo postal',
            'CP.min' => 'El codigo postal solo puede ser de 4 o 5 digitos',
            'CP.max' => 'El codigo postal solo puede ser de 4 o 5 digitos',
            'CP.regex' => 'El codigo postal solo son numeros',
            'colonia.required' => 'Es necesario que ingrese la colonia',
            'colonia.regex' => 'La colonia son solo letras',
            'MuDe.required' => 'Es necesario que ingrese el municipio',
            'MuDE.regex' => 'La colonia son solo letras',
        ];
    }
}
