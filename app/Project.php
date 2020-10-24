<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Contracts\Cache\Repository as Cache;

class Project
{
    /**
     * The filesystem implementation.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The filesystem implementation.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * Create a new documentation instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  \Illuminate\Contracts\Cache\Repository  $cache
     * @return void
     */
    public function __construct(Filesystem $files, Cache $cache)
    {
        $this->files = $files;
        $this->cache = $cache;
    }

    public function getAll()
    {
        return $this->cache->remember("projects.all", 5, function() {
            return collect($this->files->allFiles(base_path('content/projects')))
                ->filter(function($path) {
                    return Str::endsWith($path, '.md');
                })
                ->map(function($path) {
                    $filename           = Str::after($path, 'projects/');
                    [$slug, $extension] = explode('.', $filename, 3);
                    $document           = YamlFrontMatter::parse($this->files->get($path));

                    return (object) [
                        'path'     => $path->getPathName(),
                        'slug'     => $slug,
                        'url'      => route('projects.show', [$slug]),
                        'title'    => $document->title,
                        'language' => $document->language,
                        'content'  => (new Parsedown)->text($document->body()),
                    ];
                })
                ->sortByDesc('title');
            });
    }

    public function get($slug)
    {
        return $this->cache->remember("project.{$slug}", 5, function() use ($slug) {
            $project = $this->getAll()
                ->where('slug', $slug)
                ->first();

            if (! $project) {
                return null;
            }

            return $project;
        });
    }
}