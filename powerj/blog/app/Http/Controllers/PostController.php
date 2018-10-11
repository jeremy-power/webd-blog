<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use App\Repositories\Posts\Posts;
class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))->get();

        // if ($month = request('month')) {
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month);
        // }
        // if($year = request('year')) {
        //     $posts->whereYear('created_at', $year);
        // }

        // $posts = $posts->get();

        // $posts = Post::orderBy('created_at', 'desc')->get();
        

        return view('posts.index', compact('posts', 'archives'));
    }
    public function show(Post $post)
    {

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // Create a new post using the request data
        // $post = new Post();
        // $post->title = request('title');
        // $post->body = request('body');
        // //save it to the database
        // $post->save();

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);
    
        // Post::create(request(['title', 'body']));
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        session()->flash(
            'message', 'Your post has now been published.'
        );


        //redirect
        return redirect('/posts');
    }
}