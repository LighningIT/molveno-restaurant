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

    <header>
        <h1 class='font-bold'>Reservations</h1>
        @foreach ($tables as $table)
            <p> {{$table}} </p>
        @endforeach
    </header>

    <main class='pt-8'>
        <div>
            <h2 class='font-bold'>ID</h2>
        </div>
        <div class='flex justify-around'>
            @foreach ($tables as $table)
                <p> {{$table->id}} </p>
            @endforeach
        </div>
        <div class='pt-8'>
            <h2 class='font-bold'>Section_id</h2>
        </div>
        <div class='flex justify-around'>
            @foreach ($tables as $table)
                <p> {{$table->section_id}} </p>
            @endforeach
        </div>
        <div class='pt-8'>
            <h2 class='font-bold'>combined</h2>
        </div>
        <div class='flex justify-around'>
            @foreach ($tables as $table)
                <p> {{$table->combined}} </p>
            @endforeach
        </div>
        <div class='pt-8'>
            <h2 class='font-bold'>comments</h2>
        </div>
        <div class='flex justify-around'>
            @foreach ($tables as $table)
                <p> {{$table->comments}} </p>
            @endforeach
        </div>
        <div class='pt-8'>
            <h2 class='font-bold'>chairs</h2>
        </div>
        <div class='flex justify-around'>
            @foreach ($tables as $table)
                <p> {{$table->chairs}} </p>
            @endforeach
        </div>
        <div class='pt-8'>
            <h2 class='font-bold'>status_id</h2>
        </div>
        <div class='flex justify-around'>
            @foreach ($tables as $table)
                <p> {{$table->status_id}} </p>
            @endforeach
        </div>
        <div class='pt-8'>
            <h2 class='font-bold'>created_at</h2>
        </div>
        <div class='flex justify-around'>
            @foreach ($tables as $table)
                <p> {{$table->created_at}} </p>
            @endforeach
        </div>
        <div class='pt-8'>
            <h2 class='font-bold'>updated_at</h2>
        </div>
        <div class='flex justify-around'>
            @foreach ($tables as $table)
                <p> {{$table->updated_at}} </p>
            @endforeach
        </div>
    </main>

</body>
</html>
