<x-app-layout>

    @vite(['resources/js/createNewReservation.js', 'resources/js/updateTableStatus'])
    {{-- <x-slot name="header">  <x-reservation-toolbar /> </x-slot> --}}
    <div class="col-span-full grid grid-cols-4 m-1 text-lg text-center leading-loose">
        <span class="dark:text-white flex items-center">
            <span class="bg-blue-600 px-4 py-2 m-1 mr-2 text-white rounded hover:bg-molveno-lightBlue
            dark:text-white justify-start cursor-pointer"
            id="createReservationBtn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
              </span>
            <span class="justify-center ml-2">Upcoming Reservations</span>
        </span>
        <span class="dark:text-white">Upper Level</span>
        <span class="dark:text-white">Lower Level</span>
        <span class="dark:text-white">Terrace</span>
    </div>
    <div class="grid grid-cols-4 h-full max-h-[95vh]">
        <x-reservation-new />
        <div class="dark:text-white h-full max-h-[87vh] overflow-scroll">
            @foreach ($reservations as $reservation)
                <x-reservation-item
                :guest="$reservation->guest->firstname[0] . '. ' . $reservation->guest->lastname"
                :reservationTime="$reservation->created_at"
                :tableNumber="$reservation->grouped_table_id"
                :numberPersons="$reservation->num_persons"
                />
            @endforeach
        </div>

<div class="grid grid-cols-3 col-span-3 gap-2">

        @foreach ($tables as $table)
            <div class="flex flex-col justify-start col-start-<?php echo $loop->index + 1;?>" >
                @foreach ($table as $t)
                    @php($statusColor = "bg-green-500")
                    @if($t->status_id == 3)
                        @php($statusColor = "bg-orange-500")
                    @elseif(!empty($t->reservation[2]))
                        @php($statusColor = "bg-red-600")
                    @endif
        <div class="grid grid-cols-3 col-span-3 gap-2 max-h-[87vh]">
            @foreach ($tables as $table)
                <div class="flex flex-col flex-wrap justify-start items-center max-h-[87vh] col-start-<?php echo $loop->index + 1;?>" >
                    @foreach ($table as $t)
                        @php($statusColor = "bg-green-500")
                        @if(!empty($t->reservation[0]))
                            @php(date_default_timezone_set('Europe/Amsterdam'))
                            @if (strtotime(date("Y-m-d H:i")) < strtotime($t->reservation[0]->reservation_time))
                                @php($statusColor = "bg-orange-500")
                            @elseif (strtotime(date("Y-m-d H:i")) > strtotime($t->reservation[0]->reservation_time))
                                @php($statusColor = "bg-red-600")
                            @endif
                        @endif

        @foreach ($tables as $table)
            <div class="flex flex-col justify-start col-start-<?php echo $loop->index + 1;?>" >
                @foreach ($table as $t)
                    @php($statusColor = "bg-green-500")
                    @if($t->status_id == 3)
                        @php($statusColor = "bg-orange-500")
                    @elseif(!empty($t->reservation[2]))
                        @php($statusColor = "bg-red-600")
                    @endif

                    <x-tablegroups
                    class="<?php echo $statusColor; ?>"
                    :id="$t->id"
                    :tableSectionId="$t->table_section_id"
                    :combined="$t->combined"
                    :comments="$t->comments"
                    :chairs="$t->chairs"
                    :status="$t->status->status"
                    :statusId="$t->status_id" />
                @endforeach

            @endforeach
        </div>
    </div>
</x-app-layout>
