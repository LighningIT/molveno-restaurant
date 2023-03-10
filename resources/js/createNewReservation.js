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
    if (event.target.id == 'checkBtn') {
        checkPlaces(check.querySelectorAll('input'));
        info.style.display = "unset";
    }
});

async function checkPlaces(reservationDate) {
    let res = await axios.get('/reservations/edit', reservationDate)
        .then(response => response.data);
}


submitReservationBtn.addEventListener("click", (e) => {
    e.preventDefault();
})
