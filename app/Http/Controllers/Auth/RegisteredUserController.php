<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $defaultUsername = $this->generateUniqueUsername($request['email']);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $defaultUsername,
            'password' => Hash::make($request->password),
            'profile_image' => '/images/users_profile_pics/default.png',
        ]);

        $user->assignRole('Blogger');
        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('welcome');
    }
    private function generateUniqueUsername($email)
    {
        $baseUsername = explode('@', $email)[0]; // Usa la parte antes de @ como base
        $username = $baseUsername;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter; // Añadir un número si el nombre ya existe
            $counter++;
        }

        return $username;
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
