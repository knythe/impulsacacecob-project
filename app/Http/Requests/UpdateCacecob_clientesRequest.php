<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCacecob_clientesRequest extends FormRequest
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
    public function rules(): array
    {
        $clientecacecob = $this->route('cliente'); 
        // Esto obtiene el modelo de la ruta
        return [

            'nombres' => 'required|max:50',
            'apellidos' => 'required|max:50',
            'telefono' => 'required|max:15',
            'email' => 'nullable|max:80',
            'documento_identidad' => [
                'required',
                'max:11',
                Rule::unique('cacecob_clientes', 'documento_identidad')->ignore($clientecacecob->id),
            ],
            'nacionalidad' => 'required|max:200',
            'direccion' => 'required|max:200',
            'estado' => 'nullable',
            'fecha_registro' => 'nullable',
        ];
    }
}
