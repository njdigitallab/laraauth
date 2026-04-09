<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title -->
        <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
        <!-- Stylesheets -->
        <link href="{{ asset('vendor/nj-digital-lab/laraauth/css/app.css') }}" rel="stylesheet">
    </head>
    <body id="laraauth-body">
        <div id="page-container">
            <div id="page-header">
                {{ config('app.name') }}
            </div>
            <div id="page-content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
