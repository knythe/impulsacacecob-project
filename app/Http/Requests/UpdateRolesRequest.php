<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRolesRequest extends FormRequest
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
        $role = $this->route('role'); 
        $rolid = $role->id; // Esto obtiene el modelo de la ruta

        return [
            //
            'name_rol' =>'required|max:50|unique:roles,name_rol,'.$rolid,
            'estado' => 'nullable'
    
        ];
    }
}
