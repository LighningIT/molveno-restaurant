<div id="createReservationContainer"
    class="flex-col hidden absolute w-full h-full
        bg-gray-100 dark:bg-gray-900 dark:text-white">
    <form method="post" action="" enctype="multipart/form-data"
        class="mx-auto border border-solid border-black
            dark:border-white">
        @csrf
        <div id="checkForm">
            <div>
                <label for="date">date</label>
                <input type="date" id="date" name="date">
            </div>
            <div>
                <label for="time">time</label>
                <input type="time" id="time" name="time">
            </div>
            <div>
                <label for="num-persons">persons</label>
                <input type="number" id="num-persons"
                    name="num-persons" value="1" />
            </div>
            <div>
                <button type="button" id="checkBtn" name="checkBtn">check</button>
            </div>
        </div>
        <div id="information" class="hidden">
            <div>
                <label for="guest">Guest hotel</label>
                <input type="text" id="guest" name="guest">
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
                <input type="submit" value="Create new reservation">
            </div>
        </div>
    </form>
</div>
