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
        info.style.display = "none";
        tableContainer.innerHTML = '';
        reservationBtn.innerHTML = plusIcon;
    }
});

checkBtn.addEventListener('click', (event) => {
    event.preventDefault();

    if (event.target.id == 'checkBtn') {
        if (info.style.display == "flex"){
            reservationBtn.innerHTML = plusIcon;
        } else {
            info.style.display = "flex";
        }

        checkPlaces('/reservations/edit');
    }
});

document.addEventListener("DOMContentLoaded", () => {
    reservationContainer.style.display = "none";
})

async function checkPlaces(url) {
    await axios.get(url, {
        params: {
            'date': check.querySelector('#date').value,
            'time': check.querySelector('#time').value,
        }
    })
    .then(response => response.data)
    .then(data => {
        tableContainer.innerHTML = '';
        for (const d in data) {
            let div =  createGroupedTableContainer(parseInt(d))

            data[d].forEach(elem => {
                let table = createGroupedTableElement(elem.id, elem.chairs);
                addGroupedTableClasses(table);

                if (elem.reservation[0] == undefined) {
                    table.classList.add("border-green-600");
                } else {
                    if (Date.parse(elem.reservation[0].reservation_time) > Date.parse(Date()) ) {
                        table.classList.add("border-amber-700");
                    } else {
                        table.classList.add("border-red-600");
                    }

                }

                div.appendChild(table);
            });
            tableContainer.appendChild(div);
        }
    })
    .catch(error => console.log(error.response))
}

submitReservationBtn.addEventListener("click", (e) => {
    e.preventDefault();
    submitReservation(e.target.form);
});

function createGroupedTableContainer(num) {
    let div = document.createElement('div');
    div.classList.add("flex", "flex-col", "justify-start", "flex-wrap", "items-center", "h-full", "max-h-[87vh]");
    div.classList.add("col-start-" + num);
    return div;
}

function createGroupedTableElement(id, chairs) {
    let table = document.createElement('div');

    table.appendChild(
        addGroupedTableRow("http://0.0.0.0:5173/resources/img/table_icon_125938.svg", id));

    table.appendChild(
        addGroupedTableRow("http://0.0.0.0:5173/resources/img/persons.svg", chairs));

    return table;
}

function addGroupedTableClasses(element) {
    element.classList.add("m-2", "inline-block","w-28", "max-w-1/3", "h-28","border-8", "border-solid",
                    "flex", "flex-col", "justify-center", "items-center", "rounded", "bg-slate-200");
}

function addGroupedTableRow(imgSrc, content) {
    let p = document.createElement('p');
    let img = document.createElement('img');
    img.src = imgSrc;
    img.classList.add("w-6", "h-6", "inline");
    let text = document.createTextNode(content);

    p.appendChild(img);
    p.appendChild(text);
    return p;
}

async function submitReservation(data) {
    emptyErrorFields(info);
    await axios.post('/reservations/edit', data)
        .then(() => {
            reservationBtn.click();
            newNotification("Reservation created");
        })
        .catch((error) => {
            fillErrorFields(error.response.data);
        });
}

function newNotification(message) {
    const div = document.createElement('div');
    div.classList.add("absolute", "top-2", "w-full", "text-center", "dark:text-white", "py-2", "px-4", "text-2xl")
    const text = document.createTextNode(message);
    div.appendChild(text);
    document.body.appendChild(div);
    setTimeout(() => {
        document.body.removeChild(div);
    }, 5000);
}

function fillErrorFields(response) {
    for(let res in response.errors) {
        document.getElementById(res + "-error").innerText = response.errors[res]
    }
}

function emptyErrorFields(form) {
    const errors = form.querySelectorAll('.form-error');
    errors.forEach(elem => elem.innerText = '');
}
