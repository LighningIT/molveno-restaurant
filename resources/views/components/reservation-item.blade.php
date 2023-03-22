<div {{$attributes->merge(['class'=>'flex justify-center m-2 bg-blue-600 text-white dark:text-white dark:bg-blue-600'])}}>
    <div>
        <p>Name: {{$guest}}</p>
        <p>Date/Time: {{$reservationTime}}</p>
        <p>Table: {{$tableNumber}}</p>
        <p>Number of guests: {{$numberPersons}}</p>
    </div>

    <div>
        <label for="checkedIn">Check-in</label>
        <input type="checkbox" id="checkedIn">
        <div class="flex flex-col justify-center items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded ml-4">
            <a class="btn btn-primary" href="/reservationpages?id={{$reservationId}}">Edit</a>
        </div>
    </div>
</div>
