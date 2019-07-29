<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function show($username)
    {
        $user = User::findOrFail($username);
        $posts = Post::all()->where('user_id', $user->id)->reverse();

        return view('profile', [
            'user' => $user,
            'created_at' => $user->created_at->diffForHumans(),
            'posts' => $posts,
        ]);
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->message = $request->message;
        $post->user_id = Auth::user()->id;

        $post->save();

        return Redirect::action('ProfileController@show', array('userid' => $post->user_id));
    }
}
