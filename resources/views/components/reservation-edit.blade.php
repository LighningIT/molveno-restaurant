@props(['reservation'])
<div id="editReservationContainer"
    class="flex-col absolute w-full h-full
        bg-gray-100 dark:bg-gray-900 dark:text-white">
        {{-- {{$reservation->id}} --}}
    <form method="post" action="/reservations/edit{{$reservation->id}}" enctype="multipart/form-data"
        class="mx-auto w-2/3 border border-solid border-black bg-molveno-blue
            dark:border-white dark:text-black">
        @csrf
        {{ method_field('patch')}}
        <div id="checkForm" class="mx-auto flex flex-col justify-center">
            <div class="mx-auto text-center">
                <label for="date" class="justify-self-end">date</label>
                <input type="date" id="date" name="date" value=""/>
            </div>
            <div class="mx-auto text-center">
                <label for="time" class="justify-self-end">time</label>
                <input type="time" id="time" name="time" />
            </div>
            <div class="mx-auto text-center">
                <label for="num_persons" class="justify-self-end">persons</label>
                <input type="number" id="num_persons"
                    name="num_persons" value="{{$reservation->num_persons}}" />
            </div>
            <div class="mx-auto text-center">
                <button type="button" id="checkBtn" name="checkBtn">check</button>
            </div>
        </div>

        <div id="information" class="flex flex-col justify-center items-center">

            <div>
                <input type="checkbox" id="hotelguest" name="hotelguest" @checked($reservation->guest->hotel_guest)>
                <label for="guest">Guest hotel</label>
            </div>
            <div>
                <label for="firstname">First name</label>
                <input type="text" id="firstname" name="firstname" value="{{$reservation->guest->firstname}}">
            </div>
            <div>
                <label for="lastname">Last name</label>
                <input type="text" id="lastname" name="lastname" value="{{$reservation->guest->lastname}}">
            </div>
            <div>
                <label for="phonenumber">phonenumber</label>
                {{-- <input type="text" id="phonenumber" name="phonenumber" value="{{$reservation->guest->phone_number}}"> --}}
                <input type="tel" id="phonenumber" name="phonenumber" value="{{$reservation->guest->phone_number}}">
            </div>
            <div>
                <label for="email">email</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="allergy">allergy</label>
                <input type="text" id="allergy" name="allergy">
            </div>
            <div>
                <label for="comments">comments</label>
                <input type="text" id="comments" name="comments">
            </div>
            <div>
                <label for="grouped_table_id">tablenumber</label>
                <input type="number" placeholder="tablenumber" id="grouped_table_id" name="grouped_table_id" value="{{$reservation->grouped_table_id}}">
            </div>
            <div>
                <input type="submit" id="submitReservation"
                    value="Update the reservation">
            </div>
        </div>
    </form>
</div>
