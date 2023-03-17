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
        <div class="flex flex-col">
            <a class="btn btn-primary" href="{{ route('reservationpages.edit',$reservation) }}">Edit</a>
        </div>
    </div>
</div>
