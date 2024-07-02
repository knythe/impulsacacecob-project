<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUsuariosRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'role_id'=>'required',
            'user' =>'required|max:50|unique:usuarios,user',
            'contraseña'=>'required|max:50',
            'contraseña'=>'required|max:50',
            'nombres'=>'required|max:100',
            'email'=>'required|max:100',
            'fecha_registro'=>'nullable',
            'estado' => 'nullable'
        ];
    }
}
