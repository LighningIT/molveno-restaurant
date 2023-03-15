import axios from "axios";

const reservationBtn = document.getElementById('createReservationBtn');
const checkBtn = document.getElementById('checkBtn');
const reservationContainer = document.getElementById('createReservationContainer');
const info = document.getElementById('information');
const check = document.getElementById('checkForm');
const submitReservationBtn = document.getElementById("submitReservation");

reservationContainer.addEventListener('click', (event) => {
    if (event.target.id == 'createReservationContainer') {
        reservationContainer.style.display = 'none';
    }
});

reservationBtn.addEventListener('click', () => {
    reservationContainer.style.display = 'flex';
});

checkBtn.addEventListener('click', (event) => {
    event.preventDefault();
    /* const data = {
        date: check.querySelector('#date').value,
        time: check.querySelector('#time').value,
        num_persons: check.querySelector('#num-persons').value
    } */

   /*  const form = new FormData();
    form.set('date', check.querySelector('#date').value);
    form.set('time', check.querySelector('#time').value);
    form.set('num_persons', check.querySelector('#num-persons').value)
 */
    if (event.target.id == 'checkBtn') {

        checkPlaces();
        info.style.display = "flex";
    }
});

async function checkPlaces() {
    let res = await axios.get('/reservations/edit', {
        params: {
            'date': check.querySelector('#date').value,
            'time': check.querySelector('#time').value,
            'num_persons': check.querySelector('#num-persons').value
        }
    })
        .then(response => console.log(response));
        console.log(res);
}


submitReservationBtn.addEventListener("click", (e) => {
    e.preventDefault();
})
