<!DOCTYPE html>

<html class="font-sans">
    <head>
        <x-google />

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>kai desu.</title>

        @livewireStyles
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-400">
        <div class="container max-w-3xl mx-auto">
            @include('partials._header')

            <div class="flex-1 p-6 mt-12">
                @yield('content')
            </div>

            @include('partials._footer')
        </div>

        @livewireScripts
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>