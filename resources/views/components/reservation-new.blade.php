<div id="createReservationContainer"
    class="hidden absolute w-full h-full    grid-cols-11 max-h-screen
        bg-gray-100 dark:bg-gray-900 dark:text-white">
    <form method="post" action="" enctype="multipart/form-data"
        class="flex flex-col border border-solid border-black bg-molveno-blue
            dark:border-white dark:text-black">
        @csrf
        <div id="checkForm" class="mx-auto flex flex-col justify-center mb-2 w-72">
            <div class="mx-auto my-4 text-center">
               {{--  <label for="date" class="">date</label> --}}
                <input type="date" id="date" name="date"
                    value="<?= date('Y-m-d')?>" />
           {{--  </div>
            <div class="mx-auto text-center">
                <label for="time" class="justify-self-end">time</label> --}}
                <input type="time" id="time" name="time" value="<?= date('H:i') ?>" />
            </div>
            <div class="mx-auto text-center">
                <button type="button" id="checkBtn" name="checkBtn"
                class="bg-molveno-darkestBlue px-4 py-2 m-1 mr-2 text-white rounded hover:bg-molveno-lightBlue
                    dark:text-white justify-start cursor-pointer">
                    Check
                </button>
            </div>
        </div>

        <div id="information" class="hidden flex-col justify-center items-center">
            <div class="mx-auto text-center">
                <label for="num_persons" class="text-center">persons</label>
                <input type="number" id="num_persons" class="w-20"
                    name="num_persons" value="1" />

                <label for="hotel-guest" class="text-center">Guest hotel</label>
                <input type="checkbox" id="hotel-guest" name="guest">
            </div>
           <div id="num_persons-error" class="form-error text-red-500"></div>

            <div id="hotel-guest-error" class="form-error text-red-500"></div>

            <div>
                <label for="firstname" class="block text-center">First name</label>
                <input type="text" id="firstname" name="firstname">
            </div>
            <div id="firstname-error" class="form-error text-red-500"></div>

            <div>
                <label for="lastname" class="block text-center">Last name</label>
                <input type="text" id="lastname" name="lastname">
            </div>
            <div id="lastname-error" class="form-error text-red-500"></div>

            <div>
                <label for="phonenumber" class="block text-center">phonenumber</label>
                <input type="text" id="phonenumber" name="phonenumber">
            </div>
            <div id="phonenumber-error" class="form-error text-red-500"></div>

            <div>
                <label for="email" class="block text-center">email</label>
                <input type="email" id="email" name="email">
            </div>
            <div id="email-error" class="form-error text-red-500"></div>

            <div>
                <label for="comments" class="block text-center">comments</label>
                <textarea id="comments" name="comments"
                    placeholder="Allergies, highchair / boosterseat amount, extra info">
                </textarea>
            </div>
            <div id="comments-error" class="form-error text-red-500"></div>

            <div>
                <label for="tablenumber" class="block text-center">tablenumber</label>
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

    <div id="tableContainer" class="grid grid-cols-3 gap-2 w-full max-h-[87vh]">

    </div>
</div>
