@extends('_layout')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-5xl font-bold">
            {{ $post->title }}
        </h1>
    </div>

    <div class="border-t border-b border-gray-300">
        <div class="grid grid-cols-3 gap-4 max-w-4xl mx-auto p-6">
            <div>
                <h3 class="text-xs text-gray-600 uppercase">Published</h3>
                <p class="text-sm">{{ $post->date->format('Y-m-d') }}</p>
            </div>

            <div>
                <h3 class="text-xs text-gray-600 uppercase">Source</h3>
                <p class="text-sm">{{ $post->source }}</p>
            </div>

            <div>
                <h3 class="text-xs text-gray-600 uppercase">Reading Time</h3>
                <p class="text-sm">{{ $post->reading_time }}</p>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto p-6 prose lg:prose-lg">
        {!! $post->content !!}

        @if($post->source_url)
            <a href="{{ $post->source_url }}">
                Continue reading
                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>

            <span class="text-gray-500 font-mono">
                [{{ parse_url($post->source_url)['host'] }}]
            </span>
        @endif
    </div>
@endsection