<x-app-layout>

@vite(['resources/js/groupedTableManagement.js'])
@vite(['resources/css/groupedTableManagement.css'])

<div class="grid grid-cols-4 m-1 pb-2git text-lg text-center leading-loose">
    <span class="dark:text-white flex justify-center">Overview</span>
    <span class="dark:text-white flex justify-center">Upper Level</span>
    <span class="dark:text-white">Lower Level</span>
    <span class="dark:text-white">Terrace</span>
</div>

<div class="grid grid-cols-4 justify-items-center">
    <div>
        <div class="border border-solid border-black bg-molveno-darkestBlue dark:border-white h-auto text-white font-bold text-lg">

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Add new table</p>
                <x-add-button></x-add-button>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Add child seats</p>
                <x-add-button></x-add-button>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Total tables:</p>
                <div class="flex justify-center w-14 h-6">
                    <p>{{ $totalTableAmount }}</p>
                </div>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Total booster seats:</p>
                <div class="flex justify-center w-14 h-6">
                    <p>{{ count($totalChildSeats["boosterseat"]) }}</p>
                </div>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Total high chairs:</p>
                <div class="flex justify-center w-14 h-6">
                    <p>{{ count($totalChildSeats["highchair"]) }}</p>
                </div>
            </div>
        </div>
    </div>

    @foreach ($tables as $table)

    <div class="h-auto justify-center pb-8" id="allTables">
        <table class="bg-white ">

            <tr>
                <th>ID</th>
                <th>Chairs</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            @foreach ($table as $t)

                <x-groupedtable-management

                :id="$t->id"
                :tableSectionId="$t->table_section_id"
                :combined="$t->combined"
                :comments="$t->comments"
                :chairs="$t->chairs"

                />

            @endforeach

        </table>
    </div>

    @endforeach

</div>

{{-- Delete Table Group modal --}}
<x-popup-modal class="gap-10" id="deleteModal">
    <h2 class="text-3xl mb-12 -mt-8">Delete Table!</h2>

    <p class="pt-8 text-black">Are you certain you wish to delete this table group?</p>

    <div class="flex flex-row justify-around mt-14">
        <button class='bg-red-600 hover:bg-red-500 px-4 py-2 text-white rounded align-middle justify-start cursor-pointer'>
            <p>Delete</p>
        </button>
    </div>

</x-popup-modal>


<x-popup-modal class="text-black" id="editModal">
    <h2 class="text-3xl mb-12 -mt-8">Edit Table</h2>

    <form class="flex flex-col gap-3" action="">

        <p>Current Table: </p>

        <div class="flex gap-60 justify-between">
            <p>Add chairs:</p>

            <div class="flex row gap-4">
                <button class="plus-minus-button">-</button>

                <div>
                    <p>0</p>
                </div>

                <button class="plus-minus-button">+</button>

            </div>
        </div>

        <div class="flex gap-60 justify-between">
            <p>Add High chairs:</p>

            <div class="flex row gap-4">
                <button class="plus-minus-button">-</button>

                <div>
                    <p>0</p>
                </div>

                <button class="plus-minus-button">+</button>

            </div>
        </div>

        <div class="flex gap-60 justify-between">
            <p>Add Booster seats:</p>

            <div class="flex row gap-4">
                <button class="plus-minus-button">-</button>

                <div>
                    <p>0</p>
                </div>

                <button class="plus-minus-button">+</button>

            </div>
        </div>

        <div class="flex flex-row justify-center mt-14">
            <button class='bg-blue-600 hover:bg-molveno-lightBlue px-4 py-2 text-white rounded dark:text-white justify-start cursor-pointer'>
                <p>Update</p>
            </button>
        </div>

    </form>

</x-popup-modal>


<x-popup-modal class="flex flex-col gap-4" id="addTableModal">
    <h2 class="text-3xl mb-12 -mt-8">Add new Table</h2>

    <form class="flex flex-col gap-6" action="">

        <div class="flex flex-row justify-between gap-60">
            <p>Table number:</p>
            <div class="flex justify-center w-36 h-6">
                <p>{{ $totalTableAmount+1 }}</p>
            </div>
        </div>

        <div class="flex flex-row justify-between gap-60">
            <p class="self-center" >Section:</p>
            <div class="select">
                <select name="section" id="sectionSelect">
                    <option value="">Upper Level</option>
                    <option value="">Lower Level</option>
                    <option value="">Terrace</option>
                </select>
            </div>
        </div>

        <div class="flex flex-row justify-between">
            <p>Total Seats:</p>

            <div class="flex flex-row gap-4 justify-center w-36 self-center">
                <button class="plus-minus-button">-</button>

                <div>
                    <p>0</p>
                </div>

                <button class="plus-minus-button">+</button>
            </div>
        </div>

        <div class="flex flex-row justify-center mt-12">
            <button class='bg-blue-600 hover:bg-molveno-lightBlue px-4 py-2 text-white rounded dark:text-white justify-start cursor-pointer'>
                <p>Add</p>
            </button>
        </div>

    </form>
</x-popup-modal>


<x-popup-modal class="flex flex-col gap-10" id="addChildSeatsModal">
    <h2 class="text-3xl mb-12 -mt-8">Add child seats</h2>

    <div class="flex flex-row justify-between gap-60">
        <p class="self-center" >Seat type:</p>
        <div class="select">
            <select name="section" id="sectionSelect">
                <option value="">High chair</option>
                <option value="">Booster seat</option>
            </select>
        </div>
    </div>

    <div class="flex flex-row justify-between">
        <p>Total Seats:</p>

        <div class="flex flex-row gap-4 justify-center w-36 self-center">
            <button class="plus-minus-button">-</button>

            <div>
                <p>0</p>
            </div>

            <button class="plus-minus-button">+</button>
        </div>
    </div>

    <div class="flex flex-row justify-center mt-12">
        <button class='bg-blue-600 hover:bg-molveno-lightBlue px-4 py-2 text-white rounded dark:text-white justify-start cursor-pointer'>
            <p>Add</p>
        </button>
    </div>

</x-popup-modal>

</x-app-layout>
