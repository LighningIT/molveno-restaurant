import axios from "axios";

const deleteBtns = document.querySelectorAll("button.delete-user");
const editBtns = document.querySelectorAll("button.edit-user");
const saveBtns = document.querySelectorAll("button.save-user");

const deleteModal = document.getElementById('deleteModal');
const userTable = document.getElementById('user-table');

deleteBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        toggleHiddenClass(deleteModal.parentElement);
        deleteModal.querySelectorAll('button')[1].addEventListener('click', () => {
            deleteUser(btn.closest('tr'));
        });
        deleteModal.querySelectorAll('button')[0].addEventListener('click', () => {
            toggleHiddenClass(deleteModal.parentElement);
        });
    });
});

editBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        toggleDisabledInput(btn.closest('tr').cells);

        toggleHiddenClass(btn);
        toggleHiddenClass(btn.nextElementSibling);
    });
});

saveBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        toggleDisabledInput(btn.closest('tr').cells);

        // save
        saveUser(btn.closest('tr'));

        toggleHiddenClass(btn);
        toggleHiddenClass(btn.previousElementSibling);
    });
});

function toggleHiddenClass(element) {
    element.classList.toggle('hidden');
}

function toggleDisabledInput(element) {
    Array.prototype.forEach.call(element, (elem) => {
        if (elem.firstElementChild.nodeName == "INPUT") {
            elem.firstElementChild.toggleAttribute("disabled");
            elem.firstElementChild.classList.toggle('bg-inherit');
        }
    });
}

function saveUser(element) {
    const user = createUserObj(element);

    axios.patch('/adminoverview/edit', user)
        .then(response => console.log(response))
        .catch(error => console.error(error));
}

function deleteUser(element) {
    userTable.removeChild(element);
    const user = createUserObj(element);

    axios.delete('/adminoverview/edit', {data: user })
        .then(toggleHiddenClass(deleteModal.parentElement))
        .catch(error => console.error(error));
}

function createUserObj(user) {
    return {
        id: user.children[0].firstElementChild.value,
        name: user.children[1].firstElementChild.value,
        role: user.children[2].firstElementChild.value,
        email: user.children[3].firstElementChild.value,
        password: user.children[4].firstElementChild.value
    }
}
