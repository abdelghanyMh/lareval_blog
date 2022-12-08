<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::all();

        return view('home', ['posts' => $posts]);
    }

    public function about()
    {
        return view('about');
    }
}
