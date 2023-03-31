<div id="createReservationContainer"
    class="hidden absolute w-full h-full justify-start max-h-screen
        bg-gray-100 dark:bg-gray-900 dark:text-white">
    <form method="post" action="" enctype="multipart/form-data"
        class="flex flex-col border border-solid border-black bg-molveno-lightestBlue dark:bg-molveno-darkestBlue
            dark:border-white dark:text-black">
        @csrf
        <div id="checkForm" class="mx-auto flex flex-col justify-center mb-2 ">
            <div class="mx-auto text-center">
                <label for="date" class="">date</label>
                <input type="date" id="date" name="date"
                    value="<?= date('Y-m-d')?>" />
            </div>
            <div class="mx-auto text-center">
                <label for="time" class="justify-self-end">time</label>
                <input type="time" id="time" name="time" value="<?= date('H:i') ?>" />
            </div>
            <div class="mx-auto text-center">
                <button type="button" id="checkBtn" name="checkBtn">check</button>
            </div>
        </div>

        <div id="information" class="hidden flex-col justify-center items-center">
            <div class="mx-auto text-center">
                <label for="num-persons" class="block text-center dark:text-white">persons</label>
                <input type="number" id="num-persons"
                    name="num_persons" value="1" />
            </div>
            <div>
                <label for="hotel-guest" class="block text-center dark:text-white">Guest hotel</label>
                <input type="text" id="hotel-guest" name="guest">
            </div>
            <div>
                <label for="firstname" class="block text-center dark:text-white">First name</label>
                <input type="text" id="firstname" name="firstname">
            </div>
            <div>
                <label for="lastname" class="block text-center dark:text-white">Last name</label>
                <input type="text" id="lastname" name="lastname">
            </div>
            <div>
                <label for="phonenumber" class="block text-center dark:text-white">phonenumber</label>
                <input type="text" id="phonenumber" name="phonenumber">
            </div>
            <div>
                <label for="email" class="block text-center dark:text-white">email</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="comments" class="block text-center dark:text-white">comments</label>
                <textarea id="comments" name="comments"
                    placeholder="Allergies, highchair / boosterseat amount, extra info">
                </textarea>
            </div>
            <div>
                <label for="tablenumber" class="block text-center dark:text-white">tablenumber</label>
                <input type="number" placeholder="tablenumber" id="tablenumber" name="tablenumber">
            </div>
            <div>
                <input type="submit" id="submitReservation"
                    value="Create new reservation">
            </div>
        </div>
    </form>
    <div id="tableContainer" class="grid grid-cols-3 gap-2 w-full max-h-[87vh]">

    </div>
</div>
