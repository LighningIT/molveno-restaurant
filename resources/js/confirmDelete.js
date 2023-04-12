const deleteModal = document.getElementById('deleteModal');
const deleteForm = document.querySelectorAll('.deleteReservation');

document.addEventListener('DOMContentLoaded', () => {
    deleteForm.forEach((elem) => {
        elem.addEventListener('submit', (e) => {
            e.preventDefault();
            toggleHiddenModal(deleteModal.parentElement);
            deleteModal.querySelectorAll('button')[1].addEventListener('click', () => {
                elem.submit();
            });
            deleteModal.querySelectorAll('button')[0].addEventListener('click', () => {
                toggleHiddenModal(deleteModal.parentElement);
            });
        });
    });
});

function toggleHiddenModal(element) {
    element.classList.toggle('hidden');
}
