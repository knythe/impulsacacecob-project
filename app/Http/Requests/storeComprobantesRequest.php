<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeComprobantesRequest extends FormRequest
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
            'codigo_operacion' => 'required|max:30',
            'tipo_pago' => 'required|max:20',
            'fecha_pago' => 'required|date',
            'monto' => 'required|numeric|min:0',
            'estado' => 'nullable'
        ];
    }
}
