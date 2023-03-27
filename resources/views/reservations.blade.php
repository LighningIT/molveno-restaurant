<x-app-layout>

    @vite(['resources/js/createNewReservation.js', 'resources/js/updateTableStatus'])
    {{-- <x-slot name="header">  <x-reservation-toolbar /> </x-slot> --}}
    <div class="col-span-full grid grid-cols-4 m-1 text-lg text-center leading-loose">
        <span class="dark:text-white flex items-center">
            <span
                class="bg-blue-600 px-4 py-2 m-1 mr-2 text-white rounded hover:bg-molveno-lightBlue
            dark:text-white justify-start cursor-pointer"
                id="createReservationBtn">New</span>
            <span class="justify-center ml-2">Upcoming Reservations</span>
        </span>
        <span class="dark:text-white">Upper Level</span>
        <span class="dark:text-white">Lower Level</span>
        <span class="dark:text-white">Terrace</span>
    </div>
    <div class="grid grid-cols-4">
        <x-reservation-new />
        <div class="dark:text-white">
            @foreach ($reservations as $reservation)
                <x-reservation-item :guest="$reservation->guest->firstname[0] . '. ' . $reservation->guest->lastname" :reservationTime="$reservation->reservation_time" :tableNumber="$reservation->grouped_table_id" :numberPersons="$reservation->num_persons"
                    :reservationId="$reservation->id" />
            @endforeach
        </div>

        <div class="grid grid-cols-3 col-span-3 gap-2 max-h-[87vh]">
            @foreach ($tables as $table)
                <div
                    class="flex flex-col flex-wrap justify-start items-center max-h-[87vh] col-start-<?php echo $loop->index + 1; ?>">
                    @foreach ($table as $t)
                        @php($statusColor = 'bg-green-500')
                        @if (!empty($t->reservation[0]))
                            @php(date_default_timezone_set('Europe/Amsterdam'))
                            @if (strtotime(date('Y-m-d H:i')) < strtotime($t->reservation[0]->reservation_time))
                                @php($statusColor = 'bg-orange-500')
                            @elseif (strtotime(date('Y-m-d H:i')) > strtotime($t->reservation[0]->reservation_time))
                                @php($statusColor = 'bg-red-600')
                            @endif
                        @endif
                        <<<<<<< HEAD=======>>>>>>> 0cc913889d5b1c3539c6b59ea68572a2002bf42d
                            <x-tablegroups class="<?php echo $statusColor; ?>" :id="$t->id" :tableSectionId="$t->table_section_id"
                                :combined="$t->combined" :comments="$t->comments" :chairs="$t->chairs" :status="$t->status->status"
                                :statusId="$t->status_id" />
                    @endforeach
            @endforeach
        </div>
    </div>
</x-app-layout>
