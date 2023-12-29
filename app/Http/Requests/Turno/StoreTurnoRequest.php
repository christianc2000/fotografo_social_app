<?php

namespace App\Http\Requests\Turno;

use Illuminate\Foundation\Http\FormRequest;

class StoreTurnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'servicio' => 'required|exists:servicios,id', // Asegura que el servicio exista en la tabla de servicios
            'personal' => 'required|exists:users,id', // Asegura que el personal exista en la tabla de personals
            'horario' => 'required|string',
        ];
    }
}
