<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--    <link rel = "icon" type = "image/png" href = "">--}}
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', config('global.siteTitle'))</title>

    <!-- tailwindcss -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Toastr -->
    {{--    @toastr_css--}}
    @yield('css')
    @yield('componentCss')
</head>

<body>
    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
