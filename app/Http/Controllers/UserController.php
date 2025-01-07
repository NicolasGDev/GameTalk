<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:users.manage.index')->only('index');
        $this->middleware('can:users.manage.create')->only('create');
        $this->middleware('can:users.manage.store')->only('store');
        $this->middleware('can:users.manage.edit')->only('edit');
        $this->middleware('can:users.manage.update')->only('update');
        $this->middleware('can:users.manage.destroy')->only('destroy');
    }


    public function index()
    {

        $users = User::select('id', 'name', 'username', 'email', 'state')
            ->where('state', 1)
            ->get();
        $loggedInUser = Auth::user();
        return view('pages.users.index', compact('users', 'loggedInUser'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('pages.users.create', compact('roles'));
    }
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'profile_image' => '/images/users_profile_pics/default.png',
            'password' => Hash::make($request->password),

        ]);
        $user->roles()->sync($request->role);
        return redirect(route('users.manage.index'));
    }

    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('pages.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        // Si se proporciona una nueva contraseña, actualizarla
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user->roles()->sync($request->role);
        return redirect()->route('users.manage.index')->with('status', 'Usuario actualizado exitosamente');
    }

    public function selfUserUpdate(Request $request)
    {

        $id = Auth::user()->id; // Asegúrate de que sea una instancia del modelo
        $user = User::findOrFail($id);
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $url = 'images/users_profile_pics/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $upload = $request->file('image')->move($url, $fileName);
            $user->profile_image = $url . $fileName;
        }
        $user->username = $request->username;
        $user->save();

        return redirect()->back()->with('success', 'Información guardada correctamente.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->state = 0;
        $user->save();
        return redirect(route('users.manage.index'));
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('welcome');
    }
}
