<div id="createReservationContainer"
    class="hidden absolute w-full h-full grid-cols-11 max-h-screen
        bg-gray-100 dark:bg-gray-900">
    <form method="post" action="" enctype="multipart/form-data"
        class="flex flex-col border border-solid border-black bg-molveno-lightestBlue dark:bg-molveno-darkestBlue
            dark:border-white dark:text-black">
        @csrf
        <div id="checkForm" class="mx-auto flex flex-col justify-center mb-2 w-72">
            <div class="mx-auto my-4 text-center">
               {{--  <label for="date" class="">date</label> --}}
                <input type="date" id="date" name="date" min="<?= date('Y-m-d')?>"
                    value="<?= date('Y-m-d')?>" />
           {{--  </div>
            <div class="mx-auto text-center">
                <label for="time" class="justify-self-end">time</label> --}}
                <input type="time" id="time" name="time" value="<?= date('H:i') ?>" step="3600" min="00:00" max="23:59" />
            </div>
            <div class="mx-auto text-center">
                <button type="button" id="checkBtn" name="checkBtn"
                class="bg-molveno-darkestBlue dark:bg-molveno-lightBlue px-4 py-2 m-1 mr-2 text-white rounded hover:bg-molveno-lightestBlue
                    dark:text-white justify-start cursor-pointer">
                    Check
                </button>
            </div>
        </div>

        <div id="information" class="hidden flex-col justify-center items-center">
            <div class="mx-auto text-center">
                <label for="num_persons" class="text-center dark:text-white">
                    persons
                </label>
                <input type="number" id="num_persons" class="w-20"
                    name="num_persons" value="1" min="1" />

                <label for="hotel-guest" class="text-center dark:text-white">Guest hotel</label>
                <input type="checkbox" id="hotel-guest" name="guest">
            </div>
           <div id="num_persons-error" class="form-error text-red-500"></div>

            <div id="hotel-guest-error" class="form-error text-red-500"></div>

            <div>
                <label for="firstname" class="block text-center dark:text-white">
                    First name <x-form-required />
                </label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div id="firstname-error" class="form-error text-red-500"></div>

            <div>
                <label for="lastname" class="block text-center dark:text-white">
                    Last name <x-form-required />
                </label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div id="lastname-error" class="form-error text-red-500"></div>

            <div>
                <label for="phonenumber" class="block text-center dark:text-white">
                    phonenumber <x-form-required />
                </label>
                <input type="text" id="phonenumber" name="phonenumber" required>
            </div>
            <div id="phonenumber-error" class="form-error text-red-500"></div>

            <div>
                <label for="email" class="block text-center dark:text-white">email</label>
                <input type="email" id="email" name="email">
            </div>
            <div id="email-error" class="form-error text-red-500"></div>

            <div>
                <label for="comments" class="block text-center dark:text-white">comments</label>
                <textarea id="comments" name="comments"
                    placeholder="Allergies, highchair / boosterseat amount, extra info">
                </textarea>
            </div>
            <div id="comments-error" class="form-error text-red-500"></div>

            <div>
                <label for="tablenumber" class="block text-center dark:text-white">
                    tablenumber <x-form-required />
                </label>
                <input type="number" placeholder="tablenumber" id="tablenumber" name="tablenumber">
            </div>
            <div id="tablenumber-error" class="form-error text-red-500"></div>

            <div>
                <button type="submit" id="submitReservation"
                    value="Create new reservation"
                    class="bg-molveno-darkestBlue px-4 py-2 m-1 mr-2 text-white rounded hover:bg-molveno-lightBlue
                         dark:text-white justify-start cursor-pointer">
                    Submit
                </button>
            </div>
        </div>
    </form>

    <div id="tableContainer" class="grid grid-cols-reservation gap-2 w-full max-h-[87vh]">

    </div>
</div>
