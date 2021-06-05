<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function allPosts()
    {
        $user = Auth::user();
        return view('profile.profile', ['user' => $user, 'posts' => Post::all()->reverse(), 'comments' => Comment::all()]);
    }

    function addPost(Request $req)
    {
        $post = new Post();
        $post->text = $req->input('text');
        $post->author = Auth::user()->getUsername();
        $post->save();
    }

    function updatePosts() {
        $user = Auth::user();
        return view('update-posts', ['user' => $user, 'posts' => Post::all()->reverse(), 'comments' => Comment::all()]);
    }

    function deletePost(Request $req)
    {
        $post_id = $req->post_id;
        $post = Post::all()->find($post_id);
        $user = User::where('username', Auth::user()->getUsername())->first();

        if ($post->author == $user->username || $user->role == 1)
        {
            $post->delete();
        }
        return back();
    }

    function addComment(Request $req)
    {
        $comment = new Comment();
        $comment->text = $req->input('text');
        $comment->author = Auth::user()->getUsername();
        $comment->id_post = $req->input('id_post');;
        $comment->save();
    }

    function deleteComment(Request $req)
    {
        $comment_id = $req->c_id;
        $comment = Comment::all()->find($comment_id);
        $post = Post::all()->find($comment->id_post);
        $user = User::where('username', Auth::user()->getUsername())->first();

        if ($comment->author == $user->username || $user->role == 1 || $post->author == $user->username)
        {
            $comment->delete();
        }
        return back();
    }

    public function like(Request $req)
    {
        $likes_post = Like::all()->where('user', Auth::user()->getUsername())->where('id_post', $req->id)->where('is_like', 1);;
        $post = Post::all()->find($req->id);
        if (count($likes_post) == 0) {
            $like = new Like();
            $like->id_post = $req->id;
            $like->user = Auth::user()->getUsername();
            $like->is_like = 1;
            $like->save();

            $post->likes += 1;
            $post->save();
        } else {
            $likes_post->first()->delete();
            $post->likes -= 1;
            $post->save();
        }
    }

    public function dislike(Request $req)
    {
        $dislikes_post = Like::all()->where('user', Auth::user()->getUsername())->where('id_post', $req->id)->where('is_like', 0);
        $post = Post::all()->find($req->id);
        if (count($dislikes_post) == 0) {
            $like = new Like();
            $like->id_post = $req->id;
            $like->user = Auth::user()->getUsername();
            $like->is_like = 0;
            $like->save();

            $post->dislikes += 1;
            $post->save();
        } else {
            $dislikes_post->first()->delete();
            $post->dislikes -= 1;
            $post->save();
        }
    }
}
