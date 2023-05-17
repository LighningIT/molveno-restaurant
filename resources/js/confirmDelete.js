const deleteModal = document.getElementById('deleteModal');
const deleteForm = document.querySelectorAll('.deleteReservation');

deleteForm.forEach((elem) => {
    elem.addEventListener('submit', (e) => {
        e.preventDefault();
        toggleHiddenModal(deleteModal);
    });
});

deleteModal.querySelectorAll('button')[1].addEventListener('click', () => {
    deleteForm[0].submit();
});

deleteModal.querySelectorAll('button')[0].addEventListener('click', () => {
    toggleHiddenModal(deleteModal);
});

function toggleHiddenModal(element) {
    element.parentElement.classList.toggle('hidden');
}
