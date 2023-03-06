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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>

    <main class='pt-8'>
        @foreach ($tables as $table)
        <x-tablegroups
            :id="$table->id"
            :table_section_id="$table->table_section_id"
            :combined="$table->combined"
            :comments="$table->comments"
            :chairs="$table->chairs"
            :status_id="$table->status_id"/>
        @endforeach
    </main>

</body>
</html>