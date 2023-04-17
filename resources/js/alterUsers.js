import axios from "axios";

import persons from '../img/persons.svg';

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
        Array.prototype.forEach.call(parent.cells, (elem) => {
                if (elem.firstElementChild.nodeName == "INPUT") {
                    elem.firstElementChild.toggleAttribute("disabled");
                    elem.firstElementChild.classList.toggle('bg-inherit');
                }

                if (elem.firstElementChild.nodeName == "BUTTON" && elem.firstElementChild.classList.contains("edit-user")) {
                    btn.removeChild(btn.firstElementChild);
                    let img = document.createElement('img')
                    img.src = persons;
                    btn.appendChild(img);
                }
        });

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

