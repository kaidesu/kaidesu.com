<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>kai desu.</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        @include('partials._header')

        <div class="flex-1">
            @yield('content')
        </div>

        @include('partials._footer')

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>