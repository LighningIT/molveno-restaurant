<div {{$attributes->merge(['class'=>'flex justify-center m-2 bg-blue-600 text-white dark:bg-blue-600'])}}>
    <div class="">
        <p>Name: {{$guest}}</p>
        <p>Date/Time: {{$reservationTime}}</p>
        <p>Table: {{$tableNumber}}</p>
        <p>Number of guests: {{$numberPersons}}</p>
    </div>

    <div>
        <label for="checkedIn">Check-in</label>
        <input type="checkbox" id="checkedIn">
    </div>
</div>
