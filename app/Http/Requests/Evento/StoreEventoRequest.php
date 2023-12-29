<?php

namespace App\Http\Requests\Evento;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventoRequest extends FormRequest
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
            'titulo'=>'required',
            'descripcion'=>'required',
            'direccion'=>'required',
            'fecha_evento' => 'required|date_format:Y-m-d\TH:i',
            'latitud'=>'required',
            'longitud'=>'required',
            'imagen'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}
