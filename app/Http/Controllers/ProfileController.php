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
    public function getProfile($username){
        $user = User::where('username', $username)->first();
        if (!$user){
            abort(404);
        }

        return view('profile.index', ['user' => $user, 'posts' => Post::all()->reverse(), 'comments' => Comment::all(), 'profile_name' => $username]);
    }

    public function getMessages(){
        $messages = Message::all()->where('to_user', Auth::user()->getUsername())->reverse();
        return view('messages',['messages'=>$messages]);
    }

    public function updateMessages(){
        $messages = Message::all()->where('to_user', Auth::user()->getUsername())->reverse();
        return view('update-msg',['messages'=>$messages]);
    }

    public function sendMessage(Request $req){
        $message = new Message();
        $message->text = $req->text;
        $message->to_user = $req->to_user;
        $message->from_user = Auth::user()->getUsername();
        $message->save();

        return back();
    }

    function deletePage(Request $req){
        $username = $req->name;
        $user_to_delete = User::where('username', $username)->first();
        $auth_user = User::where('username', Auth::user()->getUsername())->first();

        if ($auth_user->username == $username ||  $auth_user->role == 1)
        {
            $user_to_delete->delete();
        }
        return view("home");
    }
}

