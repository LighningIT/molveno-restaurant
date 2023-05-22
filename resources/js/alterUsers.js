import axios from "axios";

const deleteBtns = document.querySelectorAll("button.delete-user");
const editBtns = document.querySelectorAll("button.edit-user");
const saveBtns = document.querySelectorAll("button.save-user");
const cancelBtns = document.querySelectorAll("button.cancel");
const changePasswordBtns = document.querySelectorAll(".change-password");

const addNewUserBtn = document.getElementById("add-new-user");

const deleteModal = document.getElementById('deleteModal');
const passwordModal = document.getElementById('passwordModal');
const userTable = document.getElementById('user-table');

let selectedBtn;

addNewUserBtn.addEventListener("click", () => {
    let row = createTableRow();
    userTable.appendChild(row);
});

function createTableRow() {
    let row = userTable.firstElementChild.cloneNode();

    Array.from(userTable.firstElementChild.cells).forEach((elem) => {
        let td = createTableCell(elem.firstElementChild);
        row.appendChild(td);
    })

    return row;
}

function createTableCell(cellType) {
    let td = document.createElement("td")
    td.appendChild(cellType.cloneNode(true));
    return td;
}

deleteBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        toggleHiddenClass(deleteModal.parentElement);
        selectedBtn = btn;
    });
});

deleteModal.querySelectorAll('button')[1].addEventListener('click', () => {
    deleteUser(selectedBtn.closest('tr'));
    selectedBtn = '';
});

deleteModal.querySelectorAll('button')[0].addEventListener('click', () => {
    toggleHiddenClass(deleteModal.parentElement);
    selectedBtn = '';
});

passwordModal.querySelectorAll('button')[1].addEventListener('click', () => {
    if (checkPassword(passwordModal)) {
        axios.patch('/adminoverview/edit', {
            id: parseInt(selectedBtn.closest('tr').firstElementChild.firstElementChild.value),
            newpw: document.getElementById("new-pw").value,
            confirmpw: document.getElementById("confirm-pw").value
        })
        .then(response => selectedBtn = '')
        .catch(error => console.error(error));
    }
});

passwordModal.querySelectorAll('button')[0].addEventListener('click', () => {
    toggleHiddenClass(passwordModal.parentElement);
    selectedBtn = '';
});

editBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        toggleDisabledInput(btn.closest('tr').cells);

        toggleHiddenClass(btn);
        toggleHiddenClass(btn.nextElementSibling);
        btn.parentElement.nextElementSibling.querySelectorAll("button").forEach((btn) => {
            toggleHiddenClass(btn);
        })
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
        btn.parentElement.nextElementSibling.querySelectorAll("button").forEach((btn) => {
            toggleHiddenClass(btn);
        })
    });
});

cancelBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        toggleDisabledInput(btn.closest('tr').cells);
        toggleHiddenClass(btn);
        toggleHiddenClass(btn.previousElementSibling);
        btn.parentElement.previousElementSibling.querySelectorAll("button").forEach((btn) => {
            toggleHiddenClass(btn);
        })
    });
});

changePasswordBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        toggleHiddenClass(passwordModal.parentElement);
        selectedBtn = btn;
    })
})

function toggleHiddenClass(element) {
    element.classList.toggle('hidden');
}

function toggleDisabledInput(element) {
    Array.prototype.forEach.call(element, (elem) => {
        if (elem.firstElementChild.nodeName == "INPUT" && elem.firstElementChild.name != 'id'
            || elem.firstElementChild.nodeName == "SELECT") {
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

function checkPassword(modal) {
    let inp = modal.querySelectorAll("input");

    return (inp[0].value != "" && inp[0].value.length > 8) &&
        (inp[1].value != "" && inp[0].value.length > 8) &&
        inp[0].value == inp[1].value ? true : false;
}

function createUserObj(user) {
    return {
        id: user.children[0].firstElementChild.value,
        name: user.children[1].firstElementChild.value,
        role: user.children[2].firstElementChild.value,
        email: user.children[3].firstElementChild.value,
    }
}
