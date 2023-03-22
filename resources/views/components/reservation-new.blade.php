<div id="createReservationContainer"
    class="hidden absolute w-full h-full justify-start
        bg-gray-100 dark:bg-gray-900 dark:text-white">
    <form method="post" action="" enctype="multipart/form-data"
        class="flex flex-col border border-solid border-black bg-molveno-blue
            dark:border-white dark:text-black">
        @csrf
        <div id="checkForm" class="mx-auto flex flex-col justify-center">
            <div class="mx-auto text-center">
                <label for="date" class="">date</label>
                <input type="date" id="date" name="date"
                    value="<?= date('Y-m-d')?>" />
            </div>
            <div class="mx-auto text-center">
                <label for="time" class="justify-self-end">time</label>
                <input type="time" id="time" name="time" />
            </div>
            <div class="mx-auto text-center">
                <button type="button" id="checkBtn" name="checkBtn">check</button>
            </div>
        </div>

        <div id="information" class="hidden flex-col justify-center">
            <div class="mx-auto text-center">
                <label for="num-persons" class="justify-self-end">persons</label>
                <input type="number" id="num-persons"
                    name="num_persons" value="1" />
            </div>
            <div>
                <label for="hotel-guest">Guest hotel</label>
                <input type="text" id="hotel-guest" name="guest">
            </div>
            <div>
                <label for="firstname">First name</label>
                <input type="text" id="firstname" name="firstname">
            </div>
            <div>
                <label for="lastname">Last name</label>
                <input type="text" id="lastname" name="lastname">
            </div>
            <div>
                <label for="phonenumber">phonenumber</label>
                <input type="text" id="phonenumber" name="phonenumber">
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
                <label for="tablenumber">tablenumber</label>
                <input type="number" placeholder="tablenumber" id="tablenumber" name="tablenumber">
            </div>
            <div>
                <input type="submit" id="submitReservation"
                    value="Create new reservation">
            </div>
        </div>
    </form>
    <div id="tableContainer" class="grid grid-cols-3 gap-2 w-full">

    </div>
</div>
