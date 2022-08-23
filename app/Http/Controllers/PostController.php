<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $title = '';

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts.posts', [
            "title" => "Semua Postingan" . $title,
            "posts" => Post::latest()->filter(request(['search', 'author']))->paginate(7)->withQueryString(),
        ]);
    }

    public function show(Post $post){
        return view('post', [
            "title" => $post->name,
            "post" => $post,
        ]);
    }
}
