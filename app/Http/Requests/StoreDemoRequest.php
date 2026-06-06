<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDemoRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a realizar esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pharmacy_name' => ['required', 'string', 'min:3', 'max:150'],
            'whatsapp' => ['required', 'string', 'min:8', 'max:25'],
        ];
    }

    /**
     * Obtiene los mensajes de error personalizados para las reglas de validación.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'pharmacy_name.required' => 'El nombre de tu farmacia es obligatorio.',
            'pharmacy_name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'pharmacy_name.max' => 'El nombre no puede exceder los 150 caracteres.',
            'whatsapp.required' => 'El número de WhatsApp es obligatorio para enviarte el acceso.',
            'whatsapp.min' => 'Ingresa un número de WhatsApp válido con código de país.',
            'whatsapp.max' => 'El número de WhatsApp no puede ser tan largo.',
        ];
    }
}
