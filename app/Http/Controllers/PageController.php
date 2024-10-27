<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    private array $rules = [
        'name' => 'required|string|max:30|regex:/^[^0-9]*$/|min:2',
    ];
    private array $errorMessages = [
        'name.required' => 'El campo nombre es requerido',
        'name.max' => 'El campo excede el numero de 30 caracteres',
        'name.regex' => 'El campo solo acepta letras',
        'name.min' => 'El campo solo debe tener minimo 2 caracteres',
    ];

    public function showHome()
    {


        $headerPosts = Post::select('id', 'title', 'body', 'post_image', 'category_id', 'created_at')
            ->where('state', 1)
            ->orderBy('created_at', 'desc')  // Ordena por la fecha de creación en orden descendente
            ->limit(2)  // Limita el resultado a 2 posts
            ->get();

        $headerPostIds = $headerPosts->pluck('id');
        $otherPosts = Post::select('id', 'title', 'body', 'post_image', 'category_id', 'created_at')
            ->where('state', 1)
            ->whereNotIn('id', $headerPostIds)  // Excluir los posts del header
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('home', compact('headerPosts', 'otherPosts'));
    }

    public function showPost(string $id)
    {
        $post = Post::with('comments.user')->findOrFail($id);  // Cargar comentarios con sus autores
        //se le pide mostrar los comentario cuyo post_id sea icual al enviado pro request
        $comments = Comment::where('post_id', $post->id)
            ->whereNull('parent_id')  // Solo comentarios principales
            ->with(['replies.user', 'user'])  // Traer usuarios tanto del comentario principal como de las respuestas
            ->get();
        $comments_count = Comment::where('post_id', $post->id)
            ->with(['replies.user', 'user'])  // Traer usuarios tanto del comentario principal como de las respuestas
            ->count();
        return view('post', compact('post', 'comments', 'comments_count'));
    }
}
