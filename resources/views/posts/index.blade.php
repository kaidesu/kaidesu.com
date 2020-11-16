@extends('_layout')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-5xl font-bold">
            Posts
        </h1>
    </div>

    <div class="max-w-4xl mx-auto p-6">
        @foreach($posts as $post)
            <div class="flex justify-center md:justify-between items-center mb-2">
                <div class="source source--{{ $post->source }}">
                    <svg class="source__icon" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3">
                    </svg>

                    <span class="source__label">{{ $post->source }}</span>
                </div>

                <a class="text-sm md:text-base truncate" href="{{ $post->url }}">{{ $post->title }}</a>

                <hr class="hidden md:block h-px border-t border-gray-400 mx-4 flex-1 border-dotted">

                <time
                    datetime="{{ $post->date->format('Y-m-d') }}"
                    style="font-variant-numeric: tabular-nums;"
                    class="tracking-wide text-sm hidden md:block"
                >
                    {{ $post->date->format('Y-m-d') }}
                </time>

                <time
                    datetime="{{ $post->date->format('Y-m-d') }}"
                    style="font-variant-numeric: tabular-nums;"
                    class="ml-auto tracking-wide text-xs block md:hidden"
                >
                    {{ $post->date->format('Y-m') }}
                </time>
            </div>
        @endforeach
    </div>
@endsection