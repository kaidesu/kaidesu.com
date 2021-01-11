@extends('_layout')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-5xl font-bold mb-3 text-gray-900 dark:text-gray-300">
            Posts
        </h1>
    </div>

    <div class="max-w-4xl mx-auto p-6">
        @foreach($posts as $post)
            <div class="flex justify-center md:justify-between items-center mb-2">
                <a class="text-sm md:text-base truncate" href="{{ $post->url }}">{{ $post->title }}</a>

                <hr class="hidden md:block h-px border-t border-gray-400 dark:border-gray-600 mx-4 flex-1 border-dotted">

                <time
                    datetime="{{ $post->date->format('Y-m-d') }}"
                    class="font-mono tracking-wide text-sm hidden md:block"
                >
                    {{ $post->date->format('M \'y') }}
                </time>

                <time
                    datetime="{{ $post->date->format('Y-m-d') }}"
                    class="font-mono ml-auto tracking-wide text-xs block md:hidden"
                >
                    {{ $post->date->format('M \'y') }}
                </time>
            </div>
        @endforeach
    </div>
@endsection