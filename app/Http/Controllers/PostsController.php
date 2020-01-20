<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    /* album controls */
    public function albumIndex() {
        return view('posts.album.index');
    }

    public function albumShow() {
        return view('posts.album.show');
    }

    /* Blog controls */

    public function __construct() {
        $this->middleware('auth')->except(['blogIndex', 'blogShow']);
    }

    public function blogIndex() {
        
        $posts = Post::latest()
        ->filter(request(['month', 'year']))
        ->get();
        
        return view('posts.blog.index', compact('posts'));
    }

    public function blogShow(Post $post) {
        return view('posts.blog.show', compact('post'));
    }

    public function blogCreate() {
        return view('posts.blog.create');
    }

    public function blogStore() {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );
        
        return redirect('/');
    }
}
