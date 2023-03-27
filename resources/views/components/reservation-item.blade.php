<div {{$attributes->merge(['class'=>'flex m-2 p-4 text-white dark:text-white bg-molveno-lightestBlue dark:bg-molveno-darkestBlue'])}}>
    <div class="w-52">
        <p>{{$guest}}</p>
        <p>{{$reservationTime}}</p>
        <p>Table: {{$tableNumber}}</p>
        <p>Number of guests: {{$numberPersons}}</p>
    </div>
    <div class="flex flex-col justify-center gap-1">
        <a class="bg-molveno-blue text-white font-bold py-2 px-2 rounded"
         href="{{ route('reservationpages' , ['id' => $reservationId]) }}">
         Edit
        </a>
    </div>
    <div class="flex flex-col justify-center gap-4 ml-3">
        <form action="/reservations/edit{{$reservationId}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-molveno-blue text-white font-bold py-2 px-2 rounded">Delete</button>
        </form>
    </div>
    <div class="flex items-center ml-3">
        <input type="checkbox" id="checkedIn"> 
        <label class="ml-1" for="checkedIn">Check-in</label>
    </div>
</div>
