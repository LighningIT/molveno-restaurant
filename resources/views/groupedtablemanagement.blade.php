<x-app-layout>

@vite(['resources/js/groupedTableManagement.js'])
@vite(['resources/css/groupedTableManagement.css'])

<div class="grid grid-cols-4 m-1 pb-2git text-lg text-center leading-loose">
    <span class="dark:text-white flex justify-center">Overview</span>
    <span class="dark:text-white flex justify-center">Upper Level</span>
    <span class="dark:text-white">Lower Level</span>
    <span class="dark:text-white">Terrace</span>
</div>

<div class="absolute top-2 text-2xl w-full">
    @if (!empty(session()->get('success')))
        <div class="text-center">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif
</div>

<div class="grid grid-cols-4 justify-items-center">
    <div>
        <div class="border border-solid border-black bg-molveno-darkestBlue dark:border-white h-auto text-white font-bold text-lg">

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Add new table</p>
                <x-add-button id="addTableBTN"></x-add-button>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Add child seats</p>
                <x-add-button id="addChildSeatsBTN"></x-add-button>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Total tables:</p>
                <div class="flex justify-center w-14 h-6">
                    <p id="totaltableamount">{{ $totalTableAmount }}</p>
                </div>
            </div>
            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Free tables:</p>
                <div class="flex justify-center w-14 h-6">
                    <p id="free-count" data-total-chairs="{{ $totalChairs }}"></p>
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
        <div class="mt-8 flex justify-center">
            <x-danger-button id="reset-button">Reset</x-danger-button>
        </div>

    </div>


    @foreach ($tables as $table)

    <div class="h-auto justify-center pb-8" id="allTables">
        <table class="bg-white">

            <tr>
                <th>ID</th>
                <th>Chairs</th>
                <th>In</th>
                <th>Out</th>
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

        <p class="pt-8 text-black">Are you certain you wish to delete this table</p>

        <div class="flex flex-row justify-around mt-14">
            <form action="" method="POST" class="deleteTable">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 px-4 py-2 text-white rounded hover:bg-red-500 dark:text-white justify-start cursor-pointer" id="deleteModalBTN">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </form>
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
        <p class="self-center">Seat type:</p>
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
