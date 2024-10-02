<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


    public function index()
    {

        $users = User::select('id', 'name', 'email', 'state')
            ->where('state', 1)
            ->get();
        $loggedInUser = Auth::user();
        return view('pages.users.index', compact('users', 'loggedInUser'));
    }

    public function create()
    {

        return view('pages.users.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('user.index'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('pages.users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        // Validar los datos
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
                // La validación unique debe ignorar el email del usuario actual
            ],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        // Actualizar los campos del usuario
        $user->name = $request->name;
        $user->email = $request->email;

        // Si se proporciona una nueva contraseña, actualizarla
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Guardar los cambios
        $user->save();

        return redirect()->route('user.index')->with('status', 'Usuario actualizado exitosamente');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->state = 0;
        $user->save();
        return redirect(route('user.index'));
    }
    public function logout(Request $request): RedirectResponse
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
