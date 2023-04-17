<x-app-layout>

@vite(['resources/js/groupedTableManagement.js'])

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
                <p>Add new table Group</p>
                <x-add-button></x-add-button>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Add boosterseat or Highchair</p>
                <x-add-button></x-add-button>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Total table groups:</p>
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
                <th>Chair Amount</th>
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

Delete Table Group modal
{{-- <x-popup-modal class="flex flex-col gap-10" id="deleteModal">

    <p class="pt-8 dark:text-white text-black">Are you certain you wish to delete this table group?</p>

    <div class="flex flex-row justify-around">
        <button class='bg-red-600 hover:bg-red-500 px-4 py-2 text-white rounded align-middle justify-start cursor-pointer'>
            <p>Delete</p>
        </button>
    </div>

</x-popup-modal> --}}

<x-popup-modal class="flex flex-col gap-10 dark:text-white text-black" id="editModal">

    <form action="">

        <h2 class="text-3xl mb-12">Edit Table</h2>

        <p>Current Table: </p>

        <div class="flex gap-20 justify-between">
            <p>Add chairs:</p>

            <div class="flex row gap-4">
                <button>+</button>

                <div>
                    <p>0</p>
                </div>

                <button>-</button>

            </div>
        </div>

        <div class="flex gap-20 justify-between">
            <p>Add High chairs:</p>

            <div class="flex row gap-4">
                <button>+</button>

                <div>
                    <p>0</p>
                </div>

                <button>-</button>

            </div>
        </div>

        <div class="flex gap-20 justify-between">
            <p>Add Booster seats:</p>

            <div class="flex row gap-4">
                <button>+</button>

                <div>
                    <p>0</p>
                </div>

                <button>-</button>

            </div>
        </div>

    </form>

    <div class="flex flex-row justify-center">
        <button class='bg-blue-600 hover:bg-molveno-lightBlue px-4 py-2 text-white rounded dark:text-white justify-start cursor-pointer'>
            <p>Update</p>
        </button>
    </div>

</x-popup-modal>

{{-- <x-popup-modal class="flex flex-col gap-10" id="editModal">
</x-popup-modal>

<x-popup-modal class="flex flex-col gap-10" id="editModal">
</x-popup-modal> --}}
</x-app-layout>
