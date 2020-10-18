<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Contracts\Cache\Repository as Cache;

class Page
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
        return $this->cache->remember("pages.all", 5, function() {
            return collect($this->files->files(base_path('content')))
                ->filter(function($path) {
                    return Str::endsWith($path, '.md');
                })
                ->map(function($path) {
                    $filename           = Str::after($path, 'content/');
                    [$slug, $extension] = explode('.', $filename, 3);
                    $document           = YamlFrontMatter::parse($this->files->get($path));
                    $date               = new \Carbon\Carbon($document->date);

                    return (object) [
                        'path'    => $path->getPathName(),
                        'date'    => $date,
                        'year'    => $date->format('Y'),
                        'month'   => $date->format('m'),
                        'day'     => $date->format('d'),
                        'slug'    => $slug,
                        'url'     => route('pages.show', [$slug]),
                        'title'   => $document->title,
                        'source'  => $document->source,
                        'content' => (new Parsedown)->text($document->body()),
                    ];
                })
                ->sortByDesc('title');
            });
    }

    public function get($slug)
    {
        return $this->cache->remember("page.{$slug}", 5, function() use ($slug) {
            $page = $this->getAll()
                ->where('slug', $slug)
                ->first();

            if (! $page) {
                return null;
            }

            return $page;
        });
    }
}