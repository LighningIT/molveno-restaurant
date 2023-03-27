import axios from "axios";

const reservationBtn = document.getElementById('createReservationBtn');
const checkBtn = document.getElementById('checkBtn');
const reservationContainer = document.getElementById('createReservationContainer');
const tableContainer = document.getElementById('tableContainer');
const info = document.getElementById('information');
const check = document.getElementById('checkForm');
const submitReservationBtn = document.getElementById("submitReservation");

const plusIcon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">' +
    '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />' + '</svg>';

const cancelIcon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">' +
        '<path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />' + '</svg>';

reservationContainer.addEventListener('click', (event) => {
    if (event.target.id == 'createReservationContainer') {
        reservationContainer.style.display = 'none';
    }
});

reservationBtn.addEventListener('click', () => {
    if (reservationContainer.style.display == "none") {
        reservationContainer.style.display = 'flex';
        reservationBtn.innerHTML = cancelIcon;
    } else {
        reservationContainer.style.display = "none";
        reservationBtn.innerHTML = plusIcon;
    }
});

checkBtn.addEventListener('click', (event) => {
    event.preventDefault();

    if (event.target.id == 'checkBtn') {
        if (info.style.display == "flex"){
            info.style.display == "none";
            reservationBtn.innerHTML = plusIcon;
            return;
        }
        info.style.display = "flex";

        checkPlaces();
    }
});

document.addEventListener("DOMContentLoaded", () => {
    reservationContainer.style.display = "none";
})

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
                let table = document.createElement('div');
                let p = document.createElement('p');
                let text = document.createTextNode(elem.id);
                p.appendChild(text);
                table.appendChild(p);

                p = document.createElement('p');
                text = document.createTextNode(elem.table_section_id);
                p.appendChild(text);
                table.appendChild(p);
                table.classList.add("m-2", "inline-block","w-28", "max-w-1/3", "h-28", "text-white", "dark:text-white")

                if (elem.reservation[0] == undefined) {
                    table.classList.add("bg-green-500");
                } else {
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
    await axios.post('/reservations/edit', data)
        .then(response => console.log(response));
}
