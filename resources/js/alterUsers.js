import axios from "axios";

const deleteBtns = document.querySelectorAll("button.delete-user");
const editBtns = document.querySelectorAll("button.edit-user");
const deleteModal = document.getElementById('deleteModal');
const userTable = document.getElementById('user-table');

deleteBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        toggleHiddenModal(deleteModal.parentElement);
        deleteModal.querySelectorAll('button')[1].addEventListener('click', () => {
            deleteUser(btn.closest('tr'));
        });
        deleteModal.querySelectorAll('button')[0].addEventListener('click', () => {
            toggleHiddenModal(deleteModal.parentElement);
        });
    });
});

editBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        let parent = btn.closest('tr');
        console.log(parent.cells);
        Array.prototype.forEach.call(parent.cells, (elem) => {
            console.log(elem);
            elem.firstElementChild.toggleAttribute("disabled");
            elem.firstElementChild.classList.toggle('bg-inherit');
            // elem.toggle('bg-inherit');
        })

       /*
        parent.cells.forEach((elem) => {
            console.log(elem);
        }) */

    })
})

function toggleHiddenModal(element) {
    element.classList.toggle('hidden');
}

function deleteUser(element) {
    userTable.removeChild(element);
    const user = createUserObj(element);

    axios.delete('/adminoverview/edit', {data: user })
        .then(toggleHiddenModal(deleteModal.parentElement));
}

function createUserObj(user) {
    return {
        id: user.children[0].textContent,
        name: user.children[1].textContent,
        role: user.children[2].textContent,
        email: user.children[3].textContent,
        password: user.children[4].textContent
    }
}

