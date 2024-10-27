<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:categories.manage.index')->only('index');
        $this->middleware('can:categories.manage.create')->only('create');
        $this->middleware('can:categories.manage.store')->only('store');
        $this->middleware('can:categories.manage.edit')->only('edit');
        $this->middleware('can:categories.manage.update')->only('update');
        $this->middleware('can:categories.manage.destroy')->only('destroy');
    }
    private array $rules = [
        'name' => 'required|string|max:30|regex:/^[^0-9]*$/|min:4',
    ];
    private array $errorMessages = [
        'name.required' => 'El campo nombre es requerido',
        'name.max' => 'El campo excede el numero de 30 caracteres',
        'name.regex' => 'El campo solo acepta letras',
        'name.min' => 'El campo debe tener minimo 4 caracteres'
    ];
    public function index()
    {

        $categories = Category::select('id', 'name', 'state')
            ->where('state', 1)
            ->withCount('posts')
            ->get();

        return view('pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate($this->rules, $this->errorMessages);

        $user = Category::create([
            'name' => $request->name,
        ]);

        return redirect(route('categories.manage.index'));
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate($this->rules, $this->errorMessages);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.manage.index')->with('status', 'Usuario actualizado exitosamente');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->state = 0;
        $category->save();
        return redirect(route('categories.manage.index'));
    }
}
