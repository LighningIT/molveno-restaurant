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
let minbutton = document.querySelectorAll('.minus');
let plusbutton = document.querySelectorAll(".plus");
let totaltableamount = parseInt(document.getElementById("totaltableamount").textContent) * 2;
let count = countEl.reduce((sum, current) => {
    console.log(sum)
   return sum -= parseInt(current.value);
}, totaltableamount);
console.log(count);

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
    if (count > 0 && count < totaltableamount) {
        count -= 2;
        parent.querySelector("input").value = parseInt(parent.querySelector("input").value) + 2;
        updateCount(parent.querySelector("input").value, parent.previousElementSibling.textContent);
    }
}

function minus(parent) {
  if (parseInt(parent.querySelector("input").value) > 0) {
    count += 2;
    parent.querySelector("input").value -= 2;
    updateCount(parent.querySelector("input").value, parent.previousElementSibling.textContent);
  }
}

function updateCount(count, tableid) {
    document.getElementById("free-count").textContent = count;
    axios.post("/updateTableLocation", {
        id: tableid,
        amount: count
    })
}

