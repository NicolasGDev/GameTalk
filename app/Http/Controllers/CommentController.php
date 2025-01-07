<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{


    public function index()
    {
        $comments = Comment::select('id', 'state', 'body', 'user_id', 'created_at')
            ->where('state', 3)
            ->get();

        return view('pages.comments.index', compact('comments'));
    }

    public function storeComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required|max:500',
        ], [
            'body.required' => 'El comentario no puede ser vacío.',
            'body.max' => 'El comentario no puede tener más de 500 caracteres.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->withFragment('comments');  // Redirige hacia la sección de comentarios en caso de error
        }

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->post_id = $request->post;
        $comment->user_id = Auth::id();
        $comment->parent_id = $request->parent;
        $comment->save();

        //Se pasa como parametro el request con el campo post que corresponde al post_id
        //se redirecciona a la funcion showPost
        return redirect()->route('page.show', ['id' => $request->post])

            ->withFragment('comments')  // Desplaza hacia los comentarios
            ->with('success', 'Comentario guardado correctamente.');
    }


    public function reportComment(Request $request, $id)
    {
        $reportedComment = Comment::findOrFail($id);
        $reportedComment->state = 3;
        $reportedComment->save();

        return redirect()->route('page.show',  $request->post)
            ->withFragment('comments')  // Desplaza hacia los comentarios
            ->with('success', 'Comentario guardado correctamente.');
    }

    public function destroy(Request $request, $id)
    {

        $comment =  Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('comment.index');
    }

    public function commentAllow($id)
    {

        $comment =  Comment::findOrFail($id);
        $comment->state = 1;
        $comment->save();

        return redirect()->route('comment.index');
    }
}
