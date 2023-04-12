const checkInBtn = document.querySelectorAll('button[data-btn]');
const reservationContainer = document.getElementById('reservationsContainer');

document.addEventListener('DOMContentLoaded', () => {
    checkInBtn.forEach((elem) => {
        elem.addEventListener('click', (e) => {
            checkIn(elem.closest("[data-name=reservation]"));
        });
    });
});

function checkIn(element) {
    addToGroupedTable(element.querySelector('.table-number').nextSibling.textContent);
    removeFromReservationList(element);
}

function removeFromReservationList(id) {
    reservationContainer.removeChild(id);
}

function addToGroupedTable(tableNum) {

    document.querySelector('[data-table-number="'+ parseInt(tableNum) + '"]').click();

}
