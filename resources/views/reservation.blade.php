<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
</head>
<body>
    
    <header class="bg-black">
        <div>
            <h1>Reservation</h1>
        </div>
    <header>

    <main class="grid grid-cols-2">
        @foreach ($tables as $table)
            <p>{{$table}}</p>
        @endforeach
    </main>

</body>
</html>