<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeApoderadosRequest extends FormRequest
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
            
            'nombres' => 'required|max:80',
            'apellidos'=>'required|max:80',
            'parentesco' => 'required|max:10',
            'telefono' => 'required|max:15',
            'estado' => 'nullable'
        ];
    }
}
