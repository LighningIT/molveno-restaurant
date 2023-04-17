<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/login.css', 'resources/js/app.js', 'resources/js/loginPasswordField.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="flex flex-col justify-between items-center font-bold">
                <div class="dark:bg-white rounded-full flex justify-center w-44 h-44">
                    <x-application-logo class="w-44 h-44 mt-2"/>
                </div>
                <h1 class="text-molveno-darkestBlue dark:text-white text-6xl z-10  dark:py-4">Molveno Lake Resort</h1>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-molveno-darkBlue dark:bg-molveno-darkestBlue shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
