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
            'nombre_evento' => 'required|max:250|unique:cacecob_eventos,nombre_evento,' . $eventoid,
            'fecha_programada' => 'required|date',
            'costo' => 'required|numeric|min:0',
            'estado' => 'nullable'
        ];
    }
}
