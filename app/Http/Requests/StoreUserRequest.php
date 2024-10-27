<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambia según tu lógica de autorización
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:58', 'min:4'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'username' => ['required', 'string', 'max:50'],
            'role' => ['required', 'exists:roles,id'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.min' => 'El nombre debe tener al menos 4 caracteres.',
            'name.max' => 'El campo nombre no debe exceder los 50 caracteres',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo no es válido.',
            'email.unique' => 'Este correo ya está registrado.',
            'username.required' => 'El campo Nombre de usuario es obligatorio',
            'username.max' => 'El campo no debe exceder los 50 caracteres',
            'role.required' => 'El campo Rol es obligatorio',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }
}
