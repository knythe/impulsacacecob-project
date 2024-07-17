<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCacecob_ventasRequest extends FormRequest
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
        $cacecobventaid = $this->route('cacecobventa'); // Aquí obtienes el ID del modelo

        return [
            'clientecacecob_id'=>'required,'.$cacecobventaid,
            'empleado_id'=>'required',
            'pagocacecob_id' => 'required',
            'evento_id' => 'required',
            'certificado' => 'required|max:80',
            'fecha_registro' => 'nullable',
            'estado'=>'nullable',
        ];
    }
}
