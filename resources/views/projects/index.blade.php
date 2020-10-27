@extends('_layout')

@section('content')
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-5xl font-bold">
            /projects
        </h1>
    </div>

    <div class="max-w-3xl mx-auto p-6">
        @foreach($projects as $project)
            <div class="flex justify-center md:justify-between items-center mb-2">
                <div class="md:w-20 inline-flex items-center md:px-2.5 md:py-0.5 rounded text-xs font-medium leading-4 md:bg-gray-900 text-gray-200 mr-2">
                    <svg class="md:-ml-0.5 h-2 w-2 text-gray-400" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3">
                    </svg>

                    <span class="hidden md:flex md:flex-1 justify-center md:ml-1.5">{{ $project->language }}</span>
                </div>

                <a class="text-sm md:text-base truncate" href="{{ $project->url }}">{{ $project->title }}</a>

                <hr class="hidden md:block h-px border-t border-gray-400 mx-4 flex-1 border-dotted">

                {{-- <div class="space-x-3">
                    @foreach ($project->languages as $language)
                        <span>{{ $language }}</span>
                    @endforeach
                </div> --}}
            </div>
        @endforeach
    </div>
@endsection