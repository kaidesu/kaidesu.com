@extends('_layout')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-5xl font-bold">
            {{ $page->title }}
        </h1>
    </div>

    <div class="max-w-4xl mx-auto p-6 prose lg:prose-lg">
        {!! $page->content !!}
    </div>
@endsection