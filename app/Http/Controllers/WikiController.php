<?php

namespace App\Http\Controllers;

use App\Wiki;

class WikiController extends Controller
{
    /**
     * @var \App\Wiki
     */
    protected $wiki;

    /**
     * Create a new WikisController instance.
     *
     * @param  \App\Wiki  $wiki
     */
    public function __construct(Wiki $wiki)
    {
        $this->wiki = $wiki;
    }

    /**
     * Show the wiki index.
     */
    public function index()
    {
        $pages   = $this->wiki->get()->where('ignore', false);
        $newest = $pages->sortByDesc('date')->where('meta', false)->take(10);
        $notable = $pages->sortBy('title')->where('notable', true);
        $meta    = $pages->sortBy('title')->where('meta', true);
        $categories = $pages->where('meta', false)->groupBy('category');

        return view('wiki.index', compact('newest', 'notable', 'meta', 'categories'));
    }

    /**
     * Show the specific wiki page.
     */
    public function show($url = '')
    {
        $page = $this->wiki->get($url);

        if (! $page) {
            abort(404);
        }

        return view('wiki.show', compact('page'));
    }

    /**
     * Show the specific wiki page.
     */
    public function source($url = '')
    {
        $url  = str_replace('.source', '', $url);
        $page = $this->wiki->get($url);

        if (! $page) {
            abort(404);
        }

        return response($page->source, 200)
            ->header('Content-Type', 'text/plain');
    }
}
