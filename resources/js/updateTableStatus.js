import axios from "axios";

const allGroupedTables = Array.from(document.getElementsByClassName('tablegroup'));

document.addEventListener('DOMContentLoaded',() => {
    allGroupedTables.forEach(elem => {
        elem.addEventListener('click', (event) => {
            sendUpdateStatus(event.target.parentElement)
        })
    }) 
})

function sendUpdateStatus(element) {
    const data = {
        id: element.children[0].textContent,
        statusId: element.dataset.statusId,
    }
    axios.post("/reservations", data)
    .then(response => {
        console.log(response)
        if (response.status == 200) {
            element.dataset.statusId = response.data.id;
            element.children[3].textContent = response.data.status

            if (response.data.id == 1) {
                element.classList.remove("bg-red-600", "bg-orange-500");
                element.classList.add("bg-green-500");
            } else {
                element.classList.remove("bg-green-500");
                element.classList.add("bg-red-600");
            }
        }
    });
}