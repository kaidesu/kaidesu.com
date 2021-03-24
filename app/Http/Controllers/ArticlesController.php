<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{
    /**
     * @var \App\Article
     */
    protected $article;

    /**
     * Create a new ArticlesController instance.
     *
     * @param  \App\Article  $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Show the articles index page.
     */
    public function index()
    {
        $articles = $this->article
            ->getAll();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the specific article.
     */
    public function show($year, $month, $slug)
    {
        $article = $this->article->get($year, $month, $slug);

        if (! $article) {
            abort(404);
        }

        return view('articles.show', compact('article'));
    }
}
