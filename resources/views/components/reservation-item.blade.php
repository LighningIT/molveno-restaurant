<div {{$attributes->merge(['class'=>'flex justify-center m-2 p-4 text-white dark:text-white bg-molveno-lightestBlue dark:bg-molveno-darkestBlue'])}}>
    <div>
        <p>Name: {{$guest}}</p>
        <p>Date/Time: {{$reservationTime}}</p>
        <p>Table: {{$tableNumber}}</p>
        <p>Number of guests: {{$numberPersons}}</p>
    </div>

    <div class="flex justify-center items-center gap-2 ml-6">
        <input type="checkbox" id="checkedIn">
        <label for="checkedIn">Check-in</label>
    </div>
    <div class="flex flex-col justify-center items-center gap-4">
        <a class="bg-blue-500
         hover:bg-blue-700
         text-white font-bold py-2 px-4 rounded ml-4"
         href="{{ route('reservationpages' , ['id' => $reservationId]) }}">
         Edit
        </a>
    </div>
</div>
