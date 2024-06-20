<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmpleadosRequest extends FormRequest
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
        $empleado = $this->route('empleado'); 
        $empleadoid = $empleado->id; // Esto obtiene el modelo de la ruta
        return [
            //
            'usuario_id'=>'required|unique:empleados,usuario_id,'.$empleadoid,
            'role_id' => 'required',
            'nombres' => 'required|max:50',
            'apellidos'=>'required|max:50',
            'dni' => 'required|max:10',
            'email' => 'required|max:50',
            'telefono' => 'required|max:15',
            'fecha_ingreso' => 'required|date',
            'estado' => 'nullable'
        ];
    }
}
