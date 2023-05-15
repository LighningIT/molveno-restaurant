import axios from "axios"

// const allTables = document.getElementById('allTables');
// const modalBackground = document.getElementById('modalBackground')
const addTableModal = document.getElementById('addTableModal')
const addChildSeatsModal = document.getElementById('addChildSeatsModal')
const deleteModal = document.getElementById('deleteModal');
const editModal = document.getElementById('editModal')

const addChildSeatsBTN = document.getElementById('addChildSeatsBTN')
const addTableBTN = document.getElementById('addTableBTN')
const deleteBTN = document.querySelectorAll(".deleteBTN");
const deleteModalBTN = document.getElementById("deleteModalBTN");
const resetBtn = document.getElementById("reset-button");

const freecount = document.getElementById("free-count");
const countEl = Array.from(document.querySelectorAll(".chair-amount"));
const minbutton = document.querySelectorAll('.minus');
const plusbutton = document.querySelectorAll(".plus");
const minTableButton = document.querySelectorAll('.minusTable');
const plusTableButton = document.querySelectorAll(".plusTable");

const addall = document.querySelectorAll('.add-all');
const removeall = document.querySelectorAll(".reset-all-chairs");

let lastSelectedTable;

let count = countFreeChairs();

freecount.textContent = count;

// Open Modals Add table and Add child seat
addTableBTN.addEventListener ('click',(event) => {
    addTableModal.parentElement.classList.toggle('hidden')
})

addChildSeatsBTN.addEventListener ('click',(event) => {
    addChildSeatsModal.parentElement.classList.toggle('hidden')
})

deleteBTN.forEach((btn)=> {
    btn.addEventListener('click', () => {
        lastSelectedTable = btn
        deleteModal.parentElement.classList.toggle('hidden')
    })
})

deleteModalBTN.addEventListener ('click',(event) => {
    event.preventDefault()
    deleteTable(lastSelectedTable)
    deleteModal.parentElement.classList.toggle('hidden')
})



// Close Modals
deleteModal.querySelectorAll('button')[0].addEventListener('click', () => {
    deleteModal.parentElement.classList.toggle('hidden')
})

addTableModal.querySelectorAll('button')[0].addEventListener('click', () => {
    addTableModal.parentElement.classList.toggle('hidden')
})

addChildSeatsModal.querySelectorAll('button')[0].addEventListener('click', () => {
    addChildSeatsModal.parentElement.classList.toggle('hidden')
})

function deleteTable (lastSelectedTable) {
    lastSelectedTable.closest("tr").remove()
    freecount.textContent = countFreeChairs()
    axios.delete("/tablemanagementDelete", {data: { id: lastSelectedTable.closest("tr").firstElementChild.dataset.id}});
}



addall.forEach((btn)=> {
    btn.addEventListener('click', () => {
        btn.closest("tr").querySelector("input").value = parseInt(btn.closest("tr").querySelector("input").value) + count;
        count = 0;
        updateCount(count, btn.closest("tr").querySelector("input").value, btn.closest("tr").firstElementChild.textContent);
        updateCount(count, btn.closest("tr").querySelector("input").value, btn.closest("tr").firstElementChild.textContent);
    })
})

removeall.forEach((btn)=> {
    btn.addEventListener('click', () => {
        count += parseInt(btn.closest("tr").querySelector("input").value);
        btn.closest("tr").querySelector("input").value = 0;
        updateCount(count, btn.closest("tr").querySelector("input").value, btn.closest("tr").firstElementChild.textContent);
        updateCount(count, btn.closest("tr").querySelector("input").value, btn.closest("tr").firstElementChild.textContent);
    })
})



resetBtn.addEventListener("click", () => {
    axios.get("/resetGroupedTables")
        .then(response => response.data)
        .then(data => {
            countEl.forEach((elem) => {
                elem.value = data[elem.closest("tr").id].chairs;
            });

            freecount.textContent = countFreeChairs()
            count = countFreeChairs();
        });
});

function countFreeChairs() {
    return countEl.reduce((sum, current) => {
        return sum -= parseInt(current.value);
        }, freecount.dataset.totalChairs * 2);
}


// Table row plus minus
minbutton.forEach((btn)=> {
    btn.addEventListener('click', () => {
        minus(btn.closest("td"));
    })
})

plusbutton.forEach((btn) => {
    btn.addEventListener("click", () => {
        plus(btn.closest("td"));
    })
})

minTableButton.forEach((btn)=> {
    btn.addEventListener('click', (event) => {
        event.preventDefault()

        if (btn.closest("div").querySelector("input").value > 0) {
            btn.closest("div").querySelector("input").value -=
            parseInt(btn.closest("div").querySelector("input").dataset.value)
        }
    })
})

plusTableButton.forEach((btn) => {
    btn.addEventListener("click", (event) => {
        event.preventDefault()
        btn.closest("div").querySelector("input").value = parseInt(btn.closest("div").querySelector("input").value)
            + parseInt(btn.closest("div").querySelector("input").dataset.value)
    })
})

function plus(parent) {
    if (count > 0 && count <= freecount.dataset.totalChairs * 2) {
        count -= 2;
        console.log(parent)
        parent.querySelector("input").value = parseInt(parent.querySelector("input").value) + 2;
        updateCount(count, parent.querySelector("input").value, parent.previousElementSibling.textContent);
    }
}

function minus(parent) {
  if (parseInt(parent.querySelector("input").value) > 0) {
    count += 2;
    parent.querySelector("input").value -= 2;
    updateCount(count, parent.querySelector("input").value, parent.previousElementSibling.textContent);
  }
}

function updateCount(count, amount, tableid) {
    freecount.textContent = count;
    axios.post("/updateTableLocation", {
        id: tableid,
        amount: amount
    })
}




