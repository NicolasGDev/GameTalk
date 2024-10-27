<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:posts.manage.index')->only('index');
        $this->middleware('can:posts.manage.create')->only('create');
        $this->middleware('can:posts.manage.store')->only('store');
        $this->middleware('can:posts.manage.edit')->only('edit');
        $this->middleware('can:posts.manage.update')->only('update');
        $this->middleware('can:posts.manage.destroy')->only('destroy');
    }

    private array $rules = [
        'title' => 'required|string|max:120|min:20',
        'body' => 'required|string|min:100',
        'image' => 'required',
        'category' => 'required',
    ];
    private array $errorMessages = [
        'title.required' => 'El campo titulo es requerido',
        'title.max' => 'El titulo debe ser de maximo 120 caracteres',
        'title.min' => 'El titulo debe tener por lo menos 20 caracteres',
        'body.min' => 'El campo cuerpo debe terner por lo menos 100 caracteres',
        'body.required' => 'El campo cuerpo del post es requerido',
        'category.required' => 'El campo categoria es requerido',
        'image.required' => 'Es necesario adjuntar una imagen',
        'string' => 'Este campo debe ser de tipo texto',
        'not_in' => 'Seleccione una categoria valida',

    ];
    public function index()
    {
        $posts = Post::select('id', 'title', 'category_id', 'user_id', 'created_at', 'updated_at', 'state')
            ->where('state', 1)
            ->get();
        return view('pages.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')
            ->where('state', 1)
            ->get();

        $tags = Tag::select('id', 'name')
            ->where('state', 1)
            ->get();

        return view('pages.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules, $this->errorMessages);

        $post = new Post();
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $url = 'images/posts/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $upload = $request->file('image')->move($url, $fileName);
            $post->post_image = $url . $fileName;
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->user_id = Auth::id();
        $post->save();

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        };
        return redirect(route('posts.manage.index'));
    }

    public function edit(string $id)
    {

        $categories = Category::select('id', 'name')
            ->where('state', 1)
            ->get();

        $tags = Tag::select('id', 'name')
            ->where('state', 1)
            ->get();

        $post = Post::findOrFail($id);
        $selectedTags = $post->tags->pluck('id')->toArray();
        return view('pages.posts.edit', compact('post', 'categories', 'tags', 'selectedTags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id); // Encontramos el post

        // Crear las reglas dinámicamente
        $rules = [
            'title' => 'required|string|max:120|min:20',
            'body' => 'required|string|min:100',
            'category' => 'required',
        ];

        // Si se sube una nueva imagen, agregamos la validación para 'image'
        if ($request->hasFile('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        // Validamos el request usando las reglas dinámicas
        $validated = $request->validate($rules, $this->errorMessages);

        // Si se adjunta una nueva imagen, eliminar la anterior y guardar la nueva
        if ($request->hasFile('image')) {
            if ($post->post_image && file_exists(public_path($post->post_image))) {
                unlink(public_path($post->post_image)); // Eliminar la imagen anterior
            }

            $file = $request->file('image');
            $url = 'images/posts/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move($url, $fileName);
            $post->post_image = $url . $fileName;
        }

        // Actualizamos los demás campos
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->save();

        // Sincronizamos los tags si se envían
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return redirect(route('posts.manage.index'))->with('success', 'Post actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->state = 0;
        $post->save();
        return redirect(route('posts.manage.index'));
    }
}
