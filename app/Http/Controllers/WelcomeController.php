<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    /**
     * Show the posts index page.
     */
    public function index()
    {
        return view('welcome');
    }
}
