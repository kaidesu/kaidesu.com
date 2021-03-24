@extends('_layout')

@section('content')
    <h1 class="text-5xl font-bold text-gray-900 dark:text-gray-300">
        Articles
    </h1>

    <div class="mt-12">
        @foreach($articles as $article)
            <div class="flex justify-center md:justify-between items-center mb-2">
                <a class="text-sm md:text-base truncate" href="{{ $article->url }}">{{ $article->title }}</a>

                <hr class="hidden md:block h-px border-t border-gray-400 dark:border-gray-600 mx-4 flex-1 border-dotted">

                <time
                    datetime="{{ $article->date->format('Y-m-d') }}"
                    class="font-mono tracking-wide text-sm hidden md:block"
                >
                    {{ $article->date->format('M \'y') }}
                </time>

                <time
                    datetime="{{ $article->date->format('Y-m-d') }}"
                    class="font-mono ml-auto tracking-wide text-xs block md:hidden"
                >
                    {{ $article->date->format('M \'y') }}
                </time>
            </div>
        @endforeach
    </div>
@endsection