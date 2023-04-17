import axios from "axios";

const allGroupedTables = document.querySelectorAll('.tablegroup');

document.addEventListener('DOMContentLoaded',() => {
    allGroupedTables.forEach(elem => {
        elem.addEventListener('click', () => {
            sendUpdateStatus(elem.closest("[data-status"))
        })
    })
})

function sendUpdateStatus(element) {
    const data = {
        id: parseInt(element.children[0].textContent),
        statusId: element.dataset.status,
    }
    axios.post("/reservations", data)
    .then(response => {
        element.dataset.status = response.data.status;

        if (response.data.id == 1) {
            element.classList.remove("border-red-600", "border-amber-700");
            element.classList.add("border-green-600");
        } else {
            element.classList.remove("border-green-600");
            element.classList.add("border-red-600");
        }
    });
}
