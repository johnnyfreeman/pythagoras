<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="api-token" content="{{ optional(auth()->user())->api_token }}">

        <title>{{ config('app.name', 'Pythagoras') }}</title>

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-9ralMzdK1QYsk4yBY680hmsb4/hJ98xK3w0TIaJ3ll4POWpWUYaA2bRjGGujGT8w" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    </head>
    <body class="bg-white text-base text-grey-darkest">

        <div id="app">
            @if (session('status'))
                <p class="p-4 bg-green-lightest border-b border-green-lighter leading-normal text-center">
                    <i class="fal fa-smile text-xl text-green mr-2"></i> {{ session('status') }}
                </p>
            @endif

            <div class="p-8">@yield('content')</div>
        </div>

        <!-- Scripts -->
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
