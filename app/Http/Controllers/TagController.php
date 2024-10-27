<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:tags.manage.index')->only('index');
        $this->middleware('can:tags.manage.create')->only('create');
        $this->middleware('can:tags.manage.store')->only('store');
        $this->middleware('can:tags.manage.edit')->only('edit');
        $this->middleware('can:tags.manage.update')->only('update');
        $this->middleware('can:tags.manage.destroy')->only('destroy');
    }
    private array $rules = [
        'name' => 'required|string|max:30|regex:/^[^0-9]*$/|min:2',
    ];
    private array $errorMessages = [
        'name.required' => 'El campo nombre es requerido',
        'name.max' => 'El campo excede el numero de 30 caracteres',
        'name.regex' => 'El campo solo acepta letras',
        'name.min' => 'El campo solo debe tener minimo 2 caracteres',
    ];
    public function index()
    {
        $tags = Tag::select('id', 'name', 'state')
            ->where('state', 1)
            ->get();
        return view('pages.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate($this->rules, $this->errorMessages);
        $user = Tag::create([
            'name' => $request->name,
        ]);

        return redirect(route('tags.manage.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $tag = Tag::findOrFail($id);
        return view('pages.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate($this->rules, $this->errorMessages);

        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tags.manage.index')->with('status', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->state = 0;
        $tag->save();
        return redirect(route('tags.manage.index'));
    }
}
