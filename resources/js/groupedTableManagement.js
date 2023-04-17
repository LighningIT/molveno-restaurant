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

// alue directly to the function parameter. This is done by putting the function call in the parameters list of the other function call, jus
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
