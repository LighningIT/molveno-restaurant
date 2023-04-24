const allTables = document.getElementById('allTables')
const modalBackground = document.getElementById('modalBackground')
const addTableModal = document.getElementById('addTableModal')

const deleteModal = document.getElementById('deleteModal')
const editModal = document.getElementById('editModal')

let lastSelectedTable

allTables.addEventListener ('click',(event) => {

    let closestButton = event.target.closest('button')

    if (closestButton != null) {
        if (closestButton.dataset.type == 'edit') {
            editGroupedTable (closestButton.closest('tr'))
            editModal.parentElement.classList.toggle('hidden')

        }

        if (closestButton.dataset.type == 'delete') {
            lastSelectedTable = closestButton.closest('tr')
            deleteModal.parentElement.classList.toggle('hidden')
        }
    }
})


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

})


deleteModal.querySelectorAll('button')[0].addEventListener('click', () => {
    deleteModal.parentElement.classList.toggle('hidden')
})

editModal.querySelectorAll('button')[0].addEventListener('click', () => {
    editModal.parentElement.classList.toggle('hidden')
})

deleteModal.querySelectorAll('button')[0].addEventListener('click', () => {
    addTableModal.parentElement.classList.toggle('hidden')
})

deleteModal.querySelectorAll('button')[0].addEventListener('click', () => {
    deleteModal.parentElement.classList.toggle('hidden')
})

// alue directly to the function parameter. This is done by putting the function call in the parameters list of the other function call, jus
function editGroupedTable (element) {

    const groupedTableId = element.children[0]
    const groupedTableChairs = element.children[1]

}

function openDeleteModal (element) {

    const groupedTableId = element.children[0]
    const groupedTableChairs = element.children[1]

}

function deleteGroupedTable () {

}


function openModal () {


}
