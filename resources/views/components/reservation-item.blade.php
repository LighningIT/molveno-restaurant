<div {{$attributes->merge(['class'=>'flex justify-center'])}}>
    <div>
        <p>Name: {{$guest}}</p>
        <p>Date: {{$reservationTime}}</p>
        <p>TableNumber {{$tableNumber}}</p>
        <p>NumberPersons: {{$numberPersons}}</p>
    </div>

    <div>

        <label for="checkedIn">Check-in</label>
        <input type="checkbox" id="checkedIn">

    </div>
</div>
