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
    await axios.get('/reservations/edit', {
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
                let table = createGroupedTableElement(elem.id);
                addGroupedTableClasses(table);

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

function createGroupedTableElement(element) {
    let table = document.createElement('div');
    let p = document.createElement('p');
    let text = document.createTextNode(element);
    p.appendChild(text);
    table.appendChild(p);
    return  table;
}

function addGroupedTableClasses(element) {
    element.classList.add("m-2", "inline-block","w-28", "max-w-1/3", "h-28", "text-white", "dark:text-white",
                    "flex", "flex-col", "justify-center", "items-center");
}

async function submitReservation(data) {
    Array.from(info.children).forEach(child => {
        child.classList == "form-error" ? emptyErrorFields(child) : "";
     });

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
    div.classList.add("absolute", "top-5", "w-full", "text-center", "dark:text-white", "py-2", "px-4")
    const text = document.createTextNode(message);
    div.appendChild(text);
    document.body.appendChild(div);
    setTimeout(() => {
        document.body.removeChild(div);
    }, 5000);
}

function fillErrorFields(response) {
    for(let res in response.errors) {
        if (document.getElementById(res + "-error"))
        document.getElementById(res + "-error").innerHTML = response.errors[res]
    }
}

function emptyErrorFields(form) {
    console.log(form);
    // Array.from(form.children).forEach(elem => console.log(elem) /* elem.innerHTML = '' */);

}
