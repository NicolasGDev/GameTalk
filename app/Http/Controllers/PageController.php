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

    public function showNewsPage()
    {
        $news = Post::select('id', 'title', 'body', 'post_image', 'category_id', 'created_at', 'user_id')
            ->where('state', 1)
            ->whereHas('categories', function ($query) {
                $query->where('name', 'noticias');  // Asegúrate de que el campo "name" sea correcto
            })
            ->orderBy('created_at', 'desc')
            ->get();
        return view('news', compact('news'));
    }

    public function showReviewsPage()
    {
        $reviews = Post::select('id', 'title', 'body', 'post_image', 'category_id', 'created_at', 'user_id')
            ->where('state', 1)
            ->whereHas('categories', function ($query) {
                $query->where('name', 'reseñas');  // Asegúrate de que el campo "name" sea el correcto para el nombre de la categoría
            })
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('reviews', compact('reviews'));
    }

    public function showForumsPage()
    {

        return view('forums');
    }

    public function showHome()
    {

        // Obtener los header posts
        $headerPosts = Post::select('id', 'title', 'body', 'post_image', 'category_id', 'created_at')
            ->where('state', 1)
            ->whereHas('categories', function ($query) {
                $query->where('name', 'noticias');  // Asegúrate de que el campo "name" sea correcto
            })
            ->orderBy('created_at', 'desc')
            ->limit(2)  // Limitar a 2 posts
            ->get();

        // Extraer los IDs de los header posts
        $headerPostIds = $headerPosts->pluck('id');

        // Obtener los other posts excluyendo los header posts
        $otherPosts = Post::select('id', 'title', 'body', 'post_image', 'category_id', 'created_at')
            ->where('state', 1)
            ->whereHas('categories', function ($query) {
                $query->where('name', 'noticias');  // Asegúrate de que el campo "name" sea correcto
            })
            ->whereNotIn('id', $headerPostIds)  // Excluir los posts del header
            ->orderBy('created_at', 'desc')
            ->limit(3)  // Limitar a 3 posts
            ->get();

        // Extraer los IDs de los other posts y combinar con los IDs de header posts

        $excludedIds = $headerPostIds->merge($otherPosts->pluck('id'));
        // Obtener los normal posts excluyendo tanto los header como los other posts
        $normalPosts = Post::select('id', 'title', 'body', 'post_image', 'category_id', 'created_at')
            ->where('state', 1)
            ->whereHas('categories', function ($query) {
                $query->where('name', 'noticias');  // Asegúrate de que el campo "name" sea correcto
            })
            ->whereNotIn('id', $excludedIds)  // Excluir los posts de header y other posts
            ->orderBy('created_at', 'desc')
            ->limit(20)
            ->get();


        $reviews = Post::select('id', 'title', 'body', 'post_image', 'category_id', 'created_at')
            ->where('state', 1)
            ->whereHas('categories', function ($query) {
                $query->where('name', 'reseñas');  // Asegúrate de que el campo "name" sea el correcto para el nombre de la categoría
            })
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('home', compact('headerPosts', 'otherPosts', 'normalPosts', 'reviews'));
    }

    public function showPost(string $id)
    {

        $post = Post::with('comments.user')->findOrFail($id);  // Cargar comentarios con sus autores
        //se le pide mostrar los comentario cuyo post_id sea icual al enviado pro request
        $comments = Comment::where('post_id', $post->id)
            ->whereNull('parent_id')  // Solo comentarios principales
            ->orderBy('created_at', 'desc')
            ->with(['replies.user', 'user'])  // Traer usuarios tanto del comentario principal como de las respuestas
            ->get();
        $comments_count = Comment::where('post_id', $post->id)
            ->with(['replies.user', 'user'])  // Traer usuarios tanto del comentario principal como de las respuestas

            ->count();
        return view('post', compact('post', 'comments', 'comments_count'));
    }
}
