<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearOrdenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cost' => 'required|numeric',
            'discount' => 'required|numeric',
            'doctor_id' => 'required',
            'dateService' => 'required|date',
            'schedule_id' => 'required',
            'nit' => 'required',
            'businessName' => 'required',
            'email' => 'required|email',
            'cellphone' => 'required|numeric',
            'totalCost' => 'required|numeric',
            'type_service' => 'required',
            'paciente_id' => 'required',
            'servicio_id' => 'required',
        ];
    } 
    public function messages()
    {
        return [
            'cost.required' => 'El campo costo es requerido',
            'cost.numeric' => 'EL campo costo debe ser numerico',
            'discount.required' => 'El descuento es requerido',
            'discount.numeric' => 'El descuento debe ser de tipo numerico',
            'doctor_id.required' => 'El doctor es requerido',
            'dateService.required' => 'La fecha de servicio es requerid',
            'dateService.date' => 'Este campo debe ser de tipo fecha',
            'schedule_id.required' => 'Horario requerido',
            'nit.required' => 'Nit requerido',
            'businessName.required' => 'razon social es requerida',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El campo de correo electrónico debe ser una dirección de correo válida.',
            'cellphone.required' => 'required|numeric',
            'cellphone.numeric' => 'required|numeric',
            'totalCost.numeric' => 'required|numeric',
            'totalCost.required' => 'required|numeric',
            'type_service.required' => 'required',
            'paciente_id.required' => 'required',
            'servicio_id.required' => 'required',
        ];
    }
}
