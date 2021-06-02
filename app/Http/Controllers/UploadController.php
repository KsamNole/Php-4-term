<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    function upload(Request $request){
        $path = $request->file('image')->store('app/public', 'public');

        $user = User::where('username', Auth::user()->getUsername())->first();

        if ($user->avatar != null){
            Storage::disk('public')->delete($user->avatar);
        }
        $user->avatar = $path;
        $user->save();

        return back();
    }

    function page(Request $request){
        return view('upload-page');
    }
}
