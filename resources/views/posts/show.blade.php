@extends('_layout')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-5xl font-bold mb-3">
            {{ $post->title }}
        </h1>

        <div class="mt-2 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>

                {{ $post->date->format('Y-m-d') }}
            </div>

            <div class="mt-2 flex items-center text-sm text-gray-500">
                <!-- Heroicon name: book-open -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>

                {{ $post->reading_time }}
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto p-6 prose lg:prose-lg">
        {!! $post->content !!}

        @if($post->source_url)
            <a href="{{ $post->source_url }}">Continue reading</a>

            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>

            <span class="text-gray-500 font-mono">
                [{{ parse_url($post->source_url)['host'] }}]
            </span>
        @endif
    </div>
@endsection