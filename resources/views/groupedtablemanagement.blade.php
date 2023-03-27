<x-app-layout>

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
                    <p>{{ $totalTableAmount }}</p>
                </div>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Total high chairs:</p>
                <div class="flex justify-center w-14 h-6">
                    <p>{{ $totalTableAmount }}</p>
                </div>
            </div>
    </div>
</div>

    @foreach ($tables as $table)

    <div class="h-auto justify-center pb-8">
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

        </x-app-layout>
