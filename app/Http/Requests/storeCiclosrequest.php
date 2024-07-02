<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCiclosrequest extends FormRequest
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
            //reglas de validacion ciclos
            'nombre_ciclo' =>'required|max:80|unique:academia_ciclos,nombre_ciclo',
            'fecha_inicio'=>'required|date',
            'fecha_finalizacion'=>'required|date',
            'costo' => 'required|numeric|min:0',
            'campus'=>'required',
            'direccion_campus'=>'nullable',
            'referencia_campus'=>'nullable',
            'empleado_id'=>'nullable',
            'fecha_registro'=>'nullable',
            'estado' => 'nullable'
        ];
    }
}
