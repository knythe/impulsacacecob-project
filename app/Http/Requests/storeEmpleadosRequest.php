<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEmpleadosRequest extends FormRequest
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
            //'nombre_ciclo' =>'required|max:80|unique:academia_ciclos,nombre_ciclo',
            'usuario_id'=>'required|unique:empleados,usuario_id',
            'area_id' => 'required',
            'nombres' => 'required|max:50',
            'apellidos'=>'required|max:50',
            'dni' => 'required|max:10',
            'email' => 'required|max:50',
            'telefono' => 'required|max:15',
            'fecha_nacimiento'=>'required|date',
            'direccion'=>'required|max:250',
            'fecha_registro' => 'nullable',
            'estado' => 'nullable'
        ];
    }
}
