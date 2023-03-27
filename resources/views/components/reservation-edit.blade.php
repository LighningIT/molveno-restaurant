@props(['reservation'])
<div id="editReservationContainer"
    class="flex flex-col justify-center items-center bg-gray-100 dark:bg-gray-900 dark:text-white">
        {{-- {{$reservation->id}} --}}
        <h2 class="text-center p-4 font-bold text-2xl">Edit this reservation</h2>
    <form method="post" action="/reservations/edit{{$reservation->id}}" enctype="multipart/form-data"
        class="border border-solid border-black bg-molveno-lightestBlue
            dark:border-white dark:text-black mb-4">
        @csrf
        {{ method_field('patch')}}
        <div id="checkForm" class="flex flex-col justify-center">
            <div class="text-center mt-2.5">
                <label for="date" class="justify-self-end">Date</label>
            </div>
            <div class="text-center">
                <input class="mb-2.5" type="date" id="date" name="date" value=""/>
            </div>
            <div class="text-center">
                <label for="time" class="justify-self-end">Time</label>
            </div>
            <div class="text-center">
                <input class="mb-2.5" type="time" id="time" name="time" />
            </div>
            <div class="mx-auto text-center">
                <label for="num_persons" class="justify-self-end">Persons</label>
            </div>
            <div class="mx-auto text-center">
                <input class="mb-2.5" type="number" id="num_persons" name="num_persons" value="{{$reservation->num_persons}}" />
            </div>
            <div class="mx-auto text-center">
                <button class="bg-molveno-blue text-white font-bold py-2 px-2 rounded mb-2.5" type="button" id="checkBtn" name="checkBtn">check</button>
            </div>
        </div>

        <div id="information" class="flex flex-col justify-center items-center">

            <div class="mb-2.5">
                <input type="checkbox" id="hotelguest" name="hotelguest" @checked($reservation->guest->hotel_guest)>
                <label for="guest">Guest hotel</label>
            </div>
            <div>
                <label for="firstname">First name</label>
            </div>
            <div>
                <input class="mb-2.5" type="text" id="firstname" name="firstname" value="{{$reservation->guest->firstname}}">
            </div>
            <div>
                <label for="lastname">Last name</label>
            </div>
            <div>
                <input class="mb-2.5" type="text" id="lastname" name="lastname" value="{{$reservation->guest->lastname}}">
            </div>
            <div>
                <label for="phonenumber">Phonenumber</label>
            </div>
            <div>            
                <input class="mb-2.5" type="tel" id="phonenumber" name="phonenumber" value="{{$reservation->guest->phone_number}}">
            </div>
            <div>
                <label for="email">Email</label>
            </div>
            <div>
                <input class="mb-2.5" type="email" id="email" name="email">
            </div>
            <div>
                <label for="grouped_table_id">Tablenumber</label>
            </div>
            <div>
                <input class="mb-2.5" type="number" placeholder="tablenumber" id="grouped_table_id" name="grouped_table_id" value="{{$reservation->grouped_table_id}}">
            </div>
            <div>
                <label for="comments">Comments</label>
            </div>
            <div>
                <textarea class="mb-2.5 ml-4 mr-4" id="comments" name="comments" rows="4" cols="50"></textarea>
            </div>
            <div>
                <input class="bg-molveno-blue text-white font-bold py-2 px-2 rounded mb-3" type="submit" id="submitReservation"
                    value="Update the reservation">
            </div>
        </div>
    </form>
</div>
