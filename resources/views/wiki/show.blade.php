@extends('_layout')

@section('content')
    <h1 class="text-5xl font-bold text-gray-900 dark:text-gray-300">
        {{ $page->title }}
    </h1>

    <div class="prose dark:prose-light lg:prose-lg mt-12">
        {!! $page->content !!}
    </div>
@endsection