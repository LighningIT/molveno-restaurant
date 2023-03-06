<div class="flex flex-col">
    <form method="post">
        @csrf
        <div>
            <div>
                <label for="datereservation">datereservation</label>
                <input type="date" id="datereservation" name="datereservation">
            </div>
            <div>
                <label for="timereservation">timereservation</label>
                <input type="time" id="timereservation" name="timereservation">
            </div>
            <div>
                <label for="numberofpersons">numberofpersons</label>
                <input type="number" placeholder="numberofpersons" id="numberofpersons" name="numberofpersons">
            </div>
            <div>
                <button type="button" id="checkbutton" name="checkbutton">check</button>
            </div>
        </div>
        <div>
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
                <label for="guestphonenumber">guestphonenumber</label>
                <input type="text" id="guestphonenumber" name="guestphonenumber">
            </div>
            <div>
                <label for="guestemail">guestemail</label>
                <input type="email" id="guestemail" name="guestemail">
            </div>
            <div>
                <label for="allergy">allergy</label>
                <input type="text" id="allergy" name="allergy">
            </div>
            <div>
                <label for="particularities">particularities</label>
                <input type="text" id="particularities" name="particularities">
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
