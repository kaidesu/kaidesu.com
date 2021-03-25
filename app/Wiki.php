<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Filesystem\Filesystem;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Contracts\Cache\Repository as Cache;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class Wiki
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
        return $this->cache->remember("wiki.all", 5, function() {
            return collect($this->files->files(base_path('content/wiki')))
                ->filter(function($path) {
                    return Str::endsWith($path, '.md');
                })
                ->map(function($path) {
                    $filename           = Str::after($path, 'content/wiki/');
                    [$slug, $extension] = explode('.', $filename, 3);
                    $source             = $this->files->get($path);
                    $document           = YamlFrontMatter::parse($source);
                    $date               = new \Carbon\Carbon($document->date);

                    return (object) [
                        'path'    => $path->getPathName(),
                        'date'    => $date,
                        'year'    => $date->format('Y'),
                        'month'   => $date->format('m'),
                        'day'     => $date->format('d'),
                        'slug'    => $slug,
                        'url'     => route('wiki.show', [$slug]),
                        'title'   => $document->title,
                        'meta'    => $document->meta ?? false,
                        'notable' => $document->notable ?? false,
                        'ignore'  => $document->ignore ?? false,
                        'category' => $document->category ?? 'Uncategorized',
                        'source'   => $source,
                        'content'  => $this->compile((new GithubFlavoredMarkdownConverter)->convertToHtml($document->body())),
                    ];
                })
                ->sortByDesc('title');
            });
    }

    public function get($slug = '')
    {
        if (! $slug) return $this->getAll();

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

    protected function compile($template, array $data = []): string
    {
        $filename = uniqid('blade_');

        $path = storage_path('app/views');

        View::addLocation($path);

        $filepath = $path . DIRECTORY_SEPARATOR . "$filename.blade.php";

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        file_put_contents($filepath, trim($template));

        $rendered = (\View::make($filename, $data))->render();

        unlink($filepath);

        return $rendered;
    }
}
