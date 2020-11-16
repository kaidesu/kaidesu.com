<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Contracts\Cache\Repository as Cache;

class Post
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
        return $this->cache->remember("posts.all", 5, function() {
            return collect($this->files->allFiles(base_path('content/posts')))
                ->filter(function($path) {
                    return Str::endsWith($path, '.md');
                })
                ->map(function($path) {
                    $filename                  = Str::after($path, 'posts/');
                    [$date, $slug, $extension] = explode('.', $filename, 3);
                    $date                      = Carbon::createFromFormat('Y-m-d', $date);
                    $document                  = YamlFrontMatter::parse($this->files->get($path));

                    return (object) [
                        'path'       => $path->getPathName(),
                        'date'       => $date,
                        'year'       => $date->format('Y'),
                        'month'      => $date->format('m'),
                        'day'        => $date->format('d'),
                        'slug'       => $slug,
                        'url'        => route('posts.show', [$date->format('Y'), $date->format('m'), $slug]),
                        'title'      => $document->title,
                        'source'     => $document->source,
                        'source_url' => $document->source_url ?? null,
                        'reading_time' => $this->calculateReadingTime($document->body()),
                        'content'    => (new Parsedown)->text($document->body()),
                    ];
                })
                ->sortByDesc('date');
            });
    }

    public function get($year, $month, $slug)
    {
        return $this->cache->remember("blog.{$year}.{$month}.{$slug}", 5, function() use ($year, $month, $slug) {
            $post = $this->getAll()
                ->where('year', $year)
                ->where('month', $month)
                ->where('slug', $slug)
                ->first();

            if (! $post) {
                return null;
            }

            return $post;
        });
    }

    protected function calculateReadingTime($content, $wpm = 250)
    {
        $wordCount = str_word_count($content);
        $time      = ceil($wordCount / $wpm);

        if ($time == 1) {
            return $time.' min';
        }

        return $time.' mins';
    }
}