@extends('_layout')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-5xl font-bold mb-3 text-gray-900 dark:text-gray-300">
            {{ $page->title }}
        </h1>
    </div>

    <div class="max-w-4xl mx-auto p-6 prose dark:prose-light lg:prose-lg">
        {!! $page->content !!}
    </div>
@endsection