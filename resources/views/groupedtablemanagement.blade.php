<x-app-layout>

<div class="grid grid-cols-4 m-1 pb-2git text-lg text-center leading-loose">
    <span class="dark:text-white flex justify-center">Overview</span>
    <span class="dark:text-white flex justify-center">Upper Level</span>
    <span class="dark:text-white">Lower Level</span>
    <span class="dark:text-white">Terrace</span>
</div>

<div class="grid grid-cols-4 justify-items-center">

    <div>
        <div class="border border-solid border-black bg-molveno-blue dark:border-white h-auto">

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Add new table Group</p>
                <button class="bg-green-500 px-4 py-2 text-white rounded hover:bg-green-400 align-middle
                dark:text-white justify-start cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Add boosterseat or Highchair</p>
                <button class="bg-green-500 px-4 py-2 text-white rounded hover:bg-green-400 align-middle
                dark:text-white justify-start cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Total table groups:</p>
                <p>{{ $boosterSeats }}</p>
                <p>10</p>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Total boosterseats:</p>
                {{-- <p>{{ $highChairs }}</p> --}}
                <p>10</p>
            </div>

            <div class="flex flex-row p-6 text-center items-center gap-10 justify-between">
                <p>Total boosterseats:</p>
                {{-- <p>{{ $highChairs }}</p> --}}
                <p>10</p>
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
