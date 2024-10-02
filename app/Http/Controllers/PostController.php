<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::select('id', 'title', 'category_id', 'user_id', 'created_at', 'updated_at', 'state')
            ->where('state', 1)
            ->get();
        return view('pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $post = Post::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'body' => $request->body,
            'post_image' => $request->image ?? 'default-image.jpg',
            'user_id' => Auth::id(), // Aquí obtenemos el ID del usuario logueado
        ]);

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
