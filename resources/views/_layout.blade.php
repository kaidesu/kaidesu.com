<!DOCTYPE html>

<html class="font-sans">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180827913-1"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-2SYY12VV5E"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-2SYY12VV5E');
        </script>

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