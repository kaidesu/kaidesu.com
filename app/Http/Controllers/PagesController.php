<?php

namespace App\Http\Controllers;

use App\Page;

class PagesController extends Controller
{
    /**
     * @var \App\Page
     */
    protected $page;

    /**
     * Create a new PagesController instance.
     *
     * @param  \App\Page  $page
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Show the pages index page.
     */
    public function index()
    {
        $pages = $this->page
            ->getAll();

        return view('pages.index', compact('pages'));
    }

    /**
     * Show the specific page.
     */
    public function show($slug)
    {
        $page = $this->page->get($slug);

        if (! $page) {
            abort(404);
        }

        return view('pages.show', compact('page'));
    }
}
