<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectsController extends Controller
{
    /**
     * @var \App\Project
     */
    protected $project;

    /**
     * Create a new ProjectsController instance.
     *
     * @param  \App\Project  $project
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Show the projects index project.
     */
    public function index()
    {
        $projects = $this->project
            ->getAll();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the specific project.
     */
    public function show($slug)
    {
        $project = $this->project->get($slug);

        if (! $project) {
            abort(404);
        }

        return view('projects.show', compact('project'));
    }
}
