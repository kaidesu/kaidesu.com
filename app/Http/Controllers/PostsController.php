<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    /**
     * @var \App\Post
     */
    protected $post;

    /**
     * Create a new PostsController instance.
     *
     * @param  \App\Post  $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Show the posts index page.
     */
    public function index()
    {
        $posts = $this->post
            ->getAll();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the specific post.
     */
    public function show($year, $month, $slug)
    {
        $post = $this->post->get($year, $month, $slug);

        if (! $post) {
            abort(404);
        }

        return view('posts.show', compact('post'));
    }
}
