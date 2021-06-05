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
        $info = [];
        $info = $this->_getUniqueMessages($info);
        return view('messages', ['info' => $info]);
    }

    public function sendMessage(Request $req)
    {
        $message = new Message();
        $message->text = $req->text;
        $message->to_user = $req->to_user;
        $message->from_user = Auth::user()->getUsername();
        $message->save();
    }

    public function updateMessages()
    {
        $info = [];
        $info = $this->_getUniqueMessages($info);
        return view('update-msg', ['info' => $info]);
    }

    public function chat($username)
    {
        $all_mes = $this->_getMessages($username);
        $to_user = User::where('username', $username)->first();
        return view('chat', ['to_user' => $to_user, 'messages' => $all_mes]);
    }

    public function updateChat($username)
    {
        $all_mes = $this->_getMessages($username);
        $to_user = User::where('username', $username)->first();
        return view('update-chat', ['to_user' => $to_user, 'messages' => $all_mes]);
    }

    function deletePage(Request $req)
    {
        $username = $req->input('name');
        $user_to_delete = User::where('username', $username)->first();
        $auth_user = User::where('username', Auth::user()->getUsername())->first();

        if ($auth_user->username == $username || $auth_user->role == 1) {
            $user_to_delete->delete();
            return view("home");
        }
        return back();
    }

    /**
     * @param $username
     * @return Message[]|\Illuminate\Database\Eloquent\Collection
     */
    public function _getMessages($username)
    {
        $to_mes = Message::all()->where('to_user', $username)->where('from_user', Auth::user()->getUsername());
        $from_mes = Message::all()->where('to_user', Auth::user()->getUsername())->where('from_user', $username);
        $all_mes = $from_mes->merge($to_mes)->sortBy('created_at');
        return $all_mes;
    }

    /**
     * @param array $info
     * @return array
     */
    public function _getUniqueMessages(array $info): array
    {
        $messages = Message::all()->where('to_user', Auth::user()->getUsername())
            ->sortBy('created_at')->reverse()->unique('from_user');
        foreach ($messages as $message) {
            $info[] = ['message' => $message, 'user' => User::where('username', $message->from_user)->first()];
        }
        return $info;
    }
}

