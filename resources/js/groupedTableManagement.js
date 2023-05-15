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

let lastSelectedTable;

// allTables.addEventListener ('click',(event) => {

//     let closestButton = event.target.closest('button')

//     if (closestButton != null) {
//         if (closestButton.dataset.type == 'edit') {
//             editGroupedTable (closestButton.closest('tr'))
//             editModal.parentElement.classList.toggle('hidden')

//         }

//         if (closestButton.dataset.type == 'delete') {
//             lastSelectedTable = closestButton.closest('tr')
//             deleteModal.parentElement.classList.toggle('hidden')
//         }
//     }
// })


window.addEventListener ('click',(event) => {

    let closestButton = event.target.closest('button')

    if (closestButton != null) {
        if (closestButton.dataset.type == 'close') {




            // if(event.target.id == 'deleteModal') {
            //     deleteModal.parentElement.classList.toggle('hidden')
            //     console.log("close", element)

            // }


            // editModal.parentElement.classList.toggle('hidden')

        }

    }
// Open Modals Add table and Add child seat
})
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
    deleteTable (lastSelectedTable)
    deleteModal.parentElement.classList.toggle('hidden')
})



// Close Modals
deleteModal.querySelectorAll('button')[0].addEventListener('click', () => {
    deleteModal.parentElement.classList.toggle('hidden')
})

editModal.querySelectorAll('button')[0].addEventListener('click', () => {
    editModal.parentElement.classList.toggle('hidden')
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
    axios.delete("/tablemanagementDelete", {data: { id: lastSelectedTable.closest("tr").firstElementChild.dataset.id}})
}





// alue directly to the function parameter. This is done by putting the function call in the parameters list of the other function call, jus
// function editGroupedTable (element) {

//     const groupedTableId = element.children[0]
//     const groupedTableChairs = element.children[1]

// }

// function openDeleteModal (element) {

//     const groupedTableId = element.children[0]
//     const groupedTableChairs = element.children[1]

// }

// function deleteGroupedTable () {

// }


// function openModal () {


// }


let countEl = Array.from(document.querySelectorAll(".chair-amount"));
const minbutton = document.querySelectorAll('.minus');
const plusbutton = document.querySelectorAll(".plus");

const totaltableamount = parseInt(document.getElementById("totaltableamount").textContent) * 2;

const addall = document.querySelectorAll('.add-all');
const removeall = document.querySelectorAll(".reset-all-chairs");

let count = countFreeChairs();

freecount.textContent = count;

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




