import axios from "axios"

const addTableModal = document.getElementById('addTableModal')
const addChildSeatsModal = document.getElementById('addChildSeatsModal')
const deleteModal = document.getElementById('deleteModal');

const addChildSeatsBTN = document.getElementById('addChildSeatsBTN')
const addTableBTN = document.getElementById('addTableBTN')
const deleteBTN = document.querySelectorAll(".deleteBTN");
const deleteModalBTN = document.getElementById("deleteModalBTN");
const resetBtn = document.getElementById("reset-button");
const submitAddTable = document.getElementById("submitAddTable")

const newTableID = document.getElementById("newTableId");
const freecount = document.getElementById("free-count");
let countEl = Array.from(document.querySelectorAll(".chair-amount"));

const minbutton = document.querySelectorAll('.minus');
const plusbutton = document.querySelectorAll(".plus");
const minTableButton = document.querySelectorAll('.minusTable');
const plusTableButton = document.querySelectorAll(".plusTable");

const addall = document.querySelectorAll('.add-all');
const removeall = document.querySelectorAll(".reset-all-chairs");

const amountSeatsInput = document.getElementById("seats-input");
const amountChildSeats = document.getElementById("child-seats");
const amountBoosterSeats = document.getElementById("booster-seats");

const addSeatsButton = document.getElementById("addseats");

const childSeatsValue = document.getElementById('childSeatSelect');
const sectionSelect = document.getElementById("sectionSelect")

let allTableRows = document.querySelectorAll('tr')

let numberOfChairs;
let lastSelectedTable;
let firstTableId;

let count = countFreeChairs();

freecount.textContent = count;

// function orderTableByID() {
//     const presentTableIds = document.querySelectorAll("[data-id]");

//     for (var i = 0; i < presentTableIds.length; i++) {
//         if (presentTableIds[i] = i)



// orderTableByID()

// Open Modals Add table and Add child seat
addTableBTN.addEventListener ('click',(event) => {
    addTableModal.parentElement.classList.toggle('hidden')
    findMissingId()
    newTableID.textContent = firstTableId
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

function deleteTable(lastSelectedTable) {
    lastSelectedTable.closest("tr").remove()

    axios.delete("/tablemanagementDelete", {data: { id: lastSelectedTable.closest("tr").firstElementChild.dataset.id}})
        .then(() => {
            freecount.textContent = countFreeChairs()
            lastSelectedTable = "";
            count = countFreeChairs()

        });
}




function createGroupedTable() {
    let tableSectionId = parseInt(sectionSelect.options[sectionSelect.selectedIndex].value)

    axios.post("/addGroupedTable", { id: firstTableId, chairs: numberOfChairs, table_section_id: tableSectionId})
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

submitAddTable.addEventListener("click", (event) => {
    event.preventDefault()
    createGroupedTable()
    addTableModal.parentElement.classList.toggle('hidden')
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
    countEl = Array.from(document.querySelectorAll(".chair-amount"));
    return countEl.reduce((sum, current) => {
        return sum -= parseInt(current.value);
        }, freecount.dataset.totalChairs * 2);
}


// Table row plus / minus btn
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

// Table modals plus / minus btn
minTableButton.forEach((btn)=> {
    btn.addEventListener('click', (event) => {
        event.preventDefault()

        if (btn.closest("div").querySelector("input").value > 0) {
            btn.closest("div").querySelector("input").value =
            parseInt(btn.closest("div").querySelector("input").value) - parseInt(btn.closest("div").querySelector("input").dataset.value)
            numberOfChairs = parseInt(btn.closest("div").querySelector("input").value)
        }
    })
})

plusTableButton.forEach((btn) => {
    btn.addEventListener("click", (event) => {
        event.preventDefault()
        btn.closest("div").querySelector("input").value = parseInt(btn.closest("div").querySelector("input").value)
            + parseInt(btn.closest("div").querySelector("input").dataset.value)

            numberOfChairs = parseInt(btn.closest("div").querySelector("input").value)
    })
})

function plus(parent) {
    if (count > 0 && count <= freecount.dataset.totalChairs * 2) {
        count -= 2;
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


function findMissingId () {
    const presentTableIds = document.querySelectorAll("[data-id]");


    for (var i = 0; i < presentTableIds.length; i++) {
        if (i+ 1 != presentTableIds[i].dataset.id) {
            firstTableId = presentTableIds[0].dataset.id -1
        } else {
            firstTableId = parseInt(presentTableIds[i].dataset.id) +1
        }
    }
    return firstTableId
}

addSeatsButton.addEventListener('click', (event) => {
    event.preventDefault();
    updateSeatsCount();
    axios.post("/childseats", {
        highchair: childSeatsValue.value,
        amount: parseInt(amountSeatsInput.value)
    })
    .then( (response) => {
        addChildSeatsModal.parentElement.classList.toggle('hidden')
        newNotification(response.data.amount + " " + response.data.chair + " added");

    })

})

function updateSeatsCount() {

    if (childSeatsValue.value == "Highchair") {

        amountChildSeats.textContent = parseInt(amountSeatsInput.value) + parseInt(amountChildSeats.textContent);

    } else if (childSeatsValue.value == "Boosterseat") {

        amountBoosterSeats.textContent = parseInt(amountSeatsInput.value) + parseInt(amountBoosterSeats.textContent);

    }

}

function newNotification(message) {
    const div = document.createElement('div');
    div.classList.add("absolute", "top-2", "w-full", "text-center", "dark:text-white", "py-2", "px-4", "text-2xl")
    const text = document.createTextNode(message);
    div.appendChild(text);
    document.body.appendChild(div);
    setTimeout(() => {
        document.body.removeChild(div);
    }, 5000);
}

