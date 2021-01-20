<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Show the wiki index.
     */
    public function index()
    {
        return view('dashboard');
    }
}
