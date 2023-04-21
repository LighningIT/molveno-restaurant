<x-app-layout>

    @vite(['resources/js/createNewReservation.js', 'resources/js/updateTableStatus.js',
        'resources/js/checkInReservation.js', 'resources/js/confirmDelete.js'])

    <div class="col-span-full grid grid-cols-12 m-1 mr-4 text-lg text-center leading-loose">
        <span class="dark:text-white flex items-center col-span-2">
            <button class="bg-molveno-darkBlue px-4 py-2 m-1 mr-2 text-white rounded hover:bg-molveno-lightBlue
            dark:text-white justify-start cursor-pointer"
            id="createReservationBtn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
            </button>
            <span class="justify-center ml-2">Upcoming Reservations</span>
        </span>
        <div class="col-span-10 grid grid-cols-reservation gap-4">
            <span class="dark:text-white mx-auto text-center inline-block">Upper Level</span>
            <span class="dark:text-white mx-auto text-center inline-block">Lower Level</span>
            <span class="dark:text-white mx-auto text-center inline-block">Terrace</span>
        </div>
    </div>

    <div class="absolute top-4 text-3xl w-full">
    @if (session('success'))
        <div class="text-center dark:text-white">
            <p>{{ session()->pull('success', '') }}</p>

        </div>
    @endif
    </div>
<div class="grid grid-cols-12 h-full max-h-[95vh]">

        <x-reservation-new />

        <x-popup-modal class="flex flex-col gap-10" id="deleteModal">

            <p class="pt-8">Are you certain you wish to delete this reservation?</p>

            <div class="flex flex-row justify-around">
                <button class='bg-red-600 hover:bg-red-500 px-4 py-2 text-white rounded align-middle justify-start cursor-pointer'>
                    Delete
                </button>
            </div>

        </x-popup-modal>

        <div id="reservationsContainer" class="dark:text-white h-full max-h-[87vh] overflow-scroll col-span-2">
            @foreach ($reservations as $reservation)
                <x-reservation-item
                :guest="strtoupper($reservation->guest->firstname[0]) . '. ' . $reservation->guest->lastname"
                :reservationTime="$reservation->reservation_time"
                :tableNumber="$reservation->grouped_table_id"
                :numberPersons="$reservation->num_persons"
                :reservationId="$reservation->id"
                />
            @endforeach
        </div>

        <div class="grid grid-cols-reservation col-span-10 gap-28 ml-4 max-h-[87vh] mr-12">
            @foreach ($tables as $table)
                <div class="flex flex-col flex-wrap justify-start items-center max-h-[87vh] col-start-<?php echo $loop->index + 1;?>" >
                    @foreach ($table as $t)

                        @php($statusColor = "border-green-600")
                        @php($st = $status[0]->status)
                        @if(!empty($t->reservation[0]))
                            @php(date_default_timezone_set('Europe/Amsterdam'))

                            @if (date("Y-m-d H:i") < date($t->reservation[0]->reservation_time))
                                @php($statusColor = "border-amber-700")
                                @php($st = $status[2]->status)
                            @elseif (date("Y-m-d H:i") > date($t->reservation[0]->reservation_time))
                                @php($statusColor = "border-red-600")
                                @php($st = $status[1]->status)
                            @endif
                        @endif

                        <x-tablegroups
                        class="<?php echo $statusColor; ?>"
                        :id="$t->id"
                        :tableSectionId="$t->table_section_id"
                        :combined="$t->combined"
                        :comments="$t->comments"
                        :chairs="$t->chairs"
                        :status="$st"
                        {{-- :statusId="$t->status_id" --}} />
                    @endforeach
                </div>

            @endforeach
        </div>
    </div>
</x-app-layout>
