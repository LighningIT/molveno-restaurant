const deleteModal = document.getElementById('deleteModal');
const deleteForm = document.getElementById('deleteReservation');

document.addEventListener('DOMContentLoaded', () => {
    deleteForm.addEventListener('submit', (e) => {
        e.preventDefault();
        toggleHiddenModal(deleteModal.parentElement);
        deleteModal.querySelectorAll('button')[1].addEventListener('click', () => {
            deleteForm.submit();
        });
        deleteModal.querySelectorAll('button')[0].addEventListener('click', () => {
            toggleHiddenModal(deleteModal.parentElement);
        });
    });
});

function toggleHiddenModal(element) {
    element.classList.toggle('hidden');
}
