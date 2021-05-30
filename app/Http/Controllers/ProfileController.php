<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Message;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            abort(404);
        }

        return view('profile.index', ['user' => $user, 'posts' => Post::all()->reverse(), 'comments' => Comment::all(), 'profile_name' => $username]);
    }

    public function getMessages()
    {
        $messages = Message::all()->where('to_user', Auth::user()->getUsername())
            ->unique('from_user')->sortBy('created_at')->reverse();
        return view('messages', ['messages' => $messages]);
    }

    public function updateMessages()
    {
        $messages = Message::all()->where('to_user', Auth::user()->getUsername())
            ->unique('from_user')->sortBy('created_at')->reverse();
        return view('update-msg', ['messages' => $messages]);
    }

    public function sendMessage(Request $req)
    {
        $this->validate($req, [
            'text' => 'required'
        ]);

        $message = new Message();
        $message->text = $req->text;
        $message->to_user = $req->to_user;
        $message->from_user = Auth::user()->getUsername();
        $message->save();

        return back();
    }

    public function chat($id)
    {
        $mes = Message::all()->find($id);
        if ($mes){
            $from_mes = Message::all()->where('to_user', Auth::user()->getUsername())->where('from_user', $mes->from_user);
            $to_mes = Message::all()->where('to_user', $mes->from_user)->where('from_user', Auth::user()->getUsername());
            $all_mes = $from_mes->merge($to_mes)->sortBy('created_at');
            return view('chat', ['messages' => $all_mes, 'id'=>$id]);
        }
        return back();
    }

    public function updateChat($id)
    {
        $mes = Message::all()->find($id);
        $from_mes = Message::all()->where('to_user', Auth::user()->getUsername())->where('from_user', $mes->from_user);
        $to_mes = Message::all()->where('to_user', $mes->from_user)->where('from_user', Auth::user()->getUsername());
        $all_mes = $from_mes->merge($to_mes)->sortBy('created_at');
        return view('update-chat', ['messages' => $all_mes]);
    }
}
