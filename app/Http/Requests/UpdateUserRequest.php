<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambia según tu lógica de autorización
    }

    public function rules(): array
    {
        $userId = $this->route('user')->id; // Obtener el ID del usuario para la validación única

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],
            'role' => ['required', 'exists:roles,id'],
            'username' => ['nullable', 'string', 'max:50'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
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
