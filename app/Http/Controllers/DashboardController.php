<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('state', 1)->count();
        $roles = Role::withCount('users')->get();
        $posts = Post::where('state', 1)->count();
        return view('dashboard', compact('users', 'posts', 'roles'));
    }
}
