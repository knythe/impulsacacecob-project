<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventosRequest extends FormRequest
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
    
        $evento = $this->route('evento');  // Esto obtiene el modelo de la ruta
        $eventoid = $evento->id;  // Aquí obtienes el ID del modelo

        return [
            'tipo_evento' =>'required|max:80',
            'nombre_evento' => 'required|max:250|unique:cacecob_eventos,nombre_evento,' . $eventoid,
            'fecha_programada'=>'required|date',
            'fecha_finalizacion'=>'required|date',
            'cant_horas_academicas'=>'required|max:3',
            'modalidad'=>'required:max:50',
            'costo' => 'required|numeric|min:0',
            'fecha_registro'=>'nullable',
            'estado' => 'nullable'
        ];
    }
}
