<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademia_ventasRequest extends FormRequest
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
    public function rules(): array
{
    $academia_venta = $this->route('academia_venta');
    $academia_ventaid = $academia_venta->id;
    return [
        'estudiante_id' => 'nullable',
        'pago_id' => 'nullable',
        'ciclo_id' => 'nullable',
        'empleado_id' => 'nullable',
        'cant_material' => 'nullable',
        'prenda' => 'nullable',
        'fecha-registro' => 'nullable',
        'estado' => 'nullable'
    ];
}

    
}
