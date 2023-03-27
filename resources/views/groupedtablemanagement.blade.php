<x-app-layout>

    {{-- <table class="bg-white ">
        <tr>
            <th>ID</th>
            <th>Table Section</th>
            <th>Chair Amount</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr> --}}

{{-- <span class="dark:text-white justify-self-start">
    <span class="bg-blue-600 px-2 m-1 mr-2 inline-block text-white dark:text-white">Add</span>
</span> --}}

<div class="grid grid-cols-4 m-1 text-lg text-center leading-loose">
    <span class="dark:text-white flex justify-center">Overview</span>
    <span class="dark:text-white flex justify-center">Upper Level</span>
    <span class="dark:text-white">Lower Level</span>
    <span class="dark:text-white">Terrace</span>
</div>

<div class="grid grid-cols-4 justify-items-center">

    @foreach ($tables as $table)

    <div class="h-auto justify-center mt-2 pb-8">
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
