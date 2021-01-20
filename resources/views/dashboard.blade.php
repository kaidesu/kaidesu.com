@extends('_layout')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-5xl font-bold mb-3 text-gray-900 dark:text-gray-300">
            Dashboard
        </h1>
    </div>

    <div class="max-w-4xl mx-auto p-6">
        <h3 class="font-bold text-3xl sm:text-2xl mb-2">Wanikani</h3>

        @livewire('wanikani')
    </div>
@endsection