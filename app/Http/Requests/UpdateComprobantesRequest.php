<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComprobantesRequest extends FormRequest
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
        $comprobante = $this->route('comprobante');  // Esto obtiene el modelo de la ruta
        $comprobanteid = $comprobante->id;  // Aquí obtienes el ID del modelo
        return [
            'codigo_operacion' => 'required|max:301|unique:comprobantes,codigo_operacion,'.$comprobanteid,
            'numero_comprobante'=>'required|max:250',
            'tipo_pago' => 'required|max:80',
            'fecha_pago' => 'required|date',
            'monto' => 'required|numeric|min:0',
            'observaciones'=>'required|max:250',
            'estado' => 'nullable',
            'fecha_registro'=>'nullable'
        ];
    }
}
