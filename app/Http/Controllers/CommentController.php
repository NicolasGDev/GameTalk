<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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


    public function reportComment($id)
    {
        $reportedComment = Comment::findOrFail($id);
        $reportedComment->state = 3;
        $reportedComment->save();

        return redirect()->back()
            ->with('success', 'Comentario reportado correctamente.');
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
