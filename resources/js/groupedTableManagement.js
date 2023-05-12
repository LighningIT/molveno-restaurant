import axios from "axios"

const allTables = document.getElementById('allTables')
const deleteModal = document.getElementById('deleteModal')
let lastSelectedTable

allTables.addEventListener ('click',(event) => {

    let closestButton = event.target.closest('button')

    if (closestButton != null) {
        if (closestButton.dataset.type == 'edit') {
            editGroupedTable (closestButton.closest('tr'))
        }
        if (closestButton.dataset.type == 'delete') {
            // deleteGroupedTable (closestButton.closest('tr'))
            console.log("delete", closestButton.closest('tr'))
            lastSelectedTable = closestButton.closest('tr')
            deleteModal.parentElement.classList.toggle('hidden')
        }
    }
})


function editGroupedTable (element) {

    const groupedTableId = element.children[0]
    const groupedTableChairs = element.children[1]

    console.log(element, "edit")

}

function openDeleteModal (element) {

    const groupedTableId = element.children[0]
    const groupedTableChairs = element.children[1]

    console.log(element, "delete", deleteModal.closest('div'))

}

function deleteGroupedTable () {

}


function openModal () {


}


let countEl = Array.from(document.querySelectorAll(".chair-amount"));
const minbutton = document.querySelectorAll('.minus');
const plusbutton = document.querySelectorAll(".plus");
const totaltableamount = parseInt(document.getElementById("totaltableamount").textContent) * 2;
const freecount = document.getElementById("free-count");
const addall = document.querySelectorAll('.add-all');
const removeall = document.querySelectorAll(".reset-all-chairs");

let count = countEl.reduce((sum, current) => {
   return sum -= parseInt(current.value);
}, freecount.dataset.totalChairs * 2);


freecount.textContent = count;

addall.forEach((btn)=> {
    btn.addEventListener('click', () => {
        btn.closest("tr").querySelector("input").value = parseInt(btn.closest("tr").querySelector("input").value) + count;
        count = 0;
        updateCount(count, btn.closest("tr").querySelector("input").value, btn.closest("tr").firstElementChild.textContent); 
    })
})

removeall.forEach((btn)=> {
    btn.addEventListener('click', () => {
        count += parseInt(btn.closest("tr").querySelector("input").value);
        btn.closest("tr").querySelector("input").value = 0;
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




