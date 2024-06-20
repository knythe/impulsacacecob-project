<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeAcademia_ventasRequest extends FormRequest
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
            'apoderado_id' => 'required',
            'estudiante_id' => 'required',
            'fecha_inscripcion' => 'nullable',
            'monto_inicial' => 'nullable',
            'comprobante_id' => 'required',
            'ciclo_id' => 'required',
            'empleado_id' => 'required',
            'estado' => 'nullable'
        ];
    }
}
