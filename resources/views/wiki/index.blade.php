@extends('_layout')

@section('content')
    <h1 class="text-5xl font-bold text-gray-900 dark:text-gray-300">
        Wiki
    </h1>

    <div class="grid grid-cols-1 gap-x-6 gap-y-12 sm:grid-cols-2 lg:grid-cols-3 mt-12">
        <div>
            <h3 class="font-bold text-3xl sm:text-2xl mb-2">Newest</h3>

            <ul class="list-disc list-inside">
                @foreach($newest as $page)
                    <li><a class="text-sm md:text-base truncate" href="{{ $page->url }}">{{ $page->title }}</a></li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="font-bold text-3xl sm:text-2xl mb-2">Notable</h3>

            <ul class="list-disc list-inside">
                @forelse($notable as $page)
                    <li><a class="text-sm md:text-base truncate" href="{{ $page->url }}">{{ $page->title }}</a></li>
                @empty
                    <li>Nothing</li>
                @endforelse
            </ul>
        </div>

        <div>
            <h3 class="font-bold text-3xl sm:text-2xl mb-2">Meta</h3>

            <ul class="list-disc list-inside">
                @forelse($meta as $page)
                    <li><a class="text-sm md:text-base truncate" href="{{ $page->url }}">{{ $page->title }}</a></li>
                @empty
                    <li>Nothing</li>
                @endforelse
            </ul>
        </div>

        @foreach ($categories as $category => $pages)
            <div>
                <h3 class="font-bold text-3xl sm:text-2xl mb-2">{{ $category }}</h3>

                <ul class="list-disc list-inside">
                    @foreach($pages as $page)
                        <li><a class="text-sm md:text-base truncate" href="{{ $page->url }}">{{ $page->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endsection