<x-app-layout>

    @vite(['resources/js/createNewReservation.js'])
    {{-- <x-slot name="header">  <x-reservation-toolbar /> </x-slot> --}}
    <div class="col-span-full grid grid-cols-11 m-1 mr-4 text-lg text-center leading-loose">
        <span class="dark:text-white flex items-center col-span-2">
            <button class="bg-blue-600 px-4 py-2 m-1 mr-2 text-white rounded hover:bg-molveno-lightBlue
            dark:text-white justify-start cursor-pointer"
            id="createReservationBtn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
            </button>
            <span class="justify-center ml-2">Upcoming Reservations</span>
        </span>
        <span class="dark:text-white col-span-3">Upper Level</span>
        <span class="dark:text-white col-span-3">Lower Level</span>
        <span class="dark:text-white col-span-3">Terrace</span>
    </div>
    <div class="grid grid-cols-11 h-full max-h-[95vh]">
        <x-reservation-new />
        <div class="dark:text-white h-full max-h-[87vh] overflow-scroll col-span-2">
            @foreach ($reservations as $reservation)
                <x-reservation-item
                :guest="$reservation->guest->firstname[0] . '. ' . $reservation->guest->lastname"
                :reservationTime="$reservation->created_at"
                :tableNumber="$reservation->grouped_table_id"
                :numberPersons="$reservation->num_persons"
                />
            @endforeach
        </div>

        <div class="grid grid-cols-3 col-span-9 gap-2 max-h-[87vh] mr-4">
            @foreach ($tables as $table)
                <div class="flex flex-col flex-wrap justify-start items-center max-h-[87vh] col-start-<?php echo $loop->index + 1;?>" >
                    @foreach ($table as $t)
                    {{ dd($t) }}
                        @php($statusColor = "bg-green-500")
                        @if(!empty($t->reservation[0]))
                            @php(date_default_timezone_set('Europe/Amsterdam'))
                            @if (strtotime(date("Y-m-d H:i")) < strtotime($t->reservation[0]->reservation_time))
                                @php($statusColor = "bg-orange-500")
                            @elseif (strtotime(date("Y-m-d H:i")) > strtotime($t->reservation[0]->reservation_time))
                                @php($statusColor = "bg-red-600")
                            @endif
                        @endif

                        <x-tablegroups
                        class="<?php echo $statusColor; ?>"
                        :id="$t->id"
                        :tableSectionId="$t->table_section_id"
                        :combined="$t->combined"
                        :comments="$t->comments"
                        :chairs="$t->chairs"
                        :statusId="$t->status->status" />
                    @endforeach

                </div>

            @endforeach
        </div>
    </div>
</x-app-layout>
