<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEstudiantesRequest extends FormRequest
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
            'nombres' => 'required|max:80',
            'apellidos'=>'required|max:80',
            'dni' => 'required|max:10',
            'sede' => 'required|max:20',
            'telefono' => 'required|max:15',
            'estado' => 'nullable'
        ];
    }
}
