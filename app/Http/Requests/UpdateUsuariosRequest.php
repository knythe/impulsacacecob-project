<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuariosRequest extends FormRequest
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
    public function rules():array
    {
        $usuario = $this->route('usuario'); 
        $usuarioid = $usuario->id; // Esto obtiene el modelo de la ruta
        return [
            //
            'user' =>'required|max:50|unique:usuarios,user,'.$usuarioid,
            'contraseña'=>'required|max:50',
            'estado' => 'nullable'
        ];
    }
}
