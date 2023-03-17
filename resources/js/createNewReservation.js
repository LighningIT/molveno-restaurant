import axios from "axios";

const reservationBtn = document.getElementById('createReservationBtn');
const checkBtn = document.getElementById('checkBtn');
const reservationContainer = document.getElementById('createReservationContainer');
const tableContainer = document.getElementById('tableContainer');
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

        }
    })
    .then(response => response.data)
    .then(data => {
        for (const d in data) {
            let div = document.createElement('div');
            div.classList.add("col-start-" + d);
            div.classList.add("flex");
            div.classList.add("flex-col");

            data[d].forEach(e => {
                let table = document.createElement('div');
                let text = document.createTextNode(e.id);
                table.appendChild(text);

                div.classList.add("bg-green-500");

                div.appendChild(table);
            });
            tableContainer.appendChild(div);
        }
    })

}

submitReservationBtn.addEventListener("click", (e) => {
    e.preventDefault();
    submitReservation(e.target.form);
})

async function submitReservation(data) {
    console.log(data);
    await axios.post('/reservations/edit', data);
}
