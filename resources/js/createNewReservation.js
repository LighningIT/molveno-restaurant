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
        tableContainer.innerHTML = '';
        for (const d in data) {
            let colNum = parseInt(d);
            let div = document.createElement('div');
            div.classList.add("flex", "flex-col", "justify-start", "flex-wrap", "items-center", "h-full", "max-h-[87vh]");
            div.classList.add("col-start-" + colNum);

            data[d].forEach(elem => {
                console.log(elem);
                let table = document.createElement('div');
                let p = document.createElement('p');
                let text = document.createTextNode(elem.id);
                p.appendChild(text);
                table.appendChild(p);

                p = document.createElement('p');
                text = document.createTextNode(elem.table_section_id);
                p.appendChild(text);
                table.appendChild(p);
                table.classList.add("m-2", "w-1/2", "inline-block", "text-white", "dark:text-white")

                if (elem.reservation[0] == undefined) {
                    table.classList.add("bg-green-500");
                } else {
                    /* console.log(new Date())
                    console.log(elem.reservation[0].reservation_time < new Date()) */
                    table.classList.add("bg-red-600");
                }

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
    await axios.post('/reservations/edit', data)
        .then(response => console.log(response));
}
