<x-app-layout>

    @vite(['resources/js/createNewReservation.js', 'resources/js/updateTableStatus'])
    {{-- <x-slot name="header">  <x-reservation-toolbar /> </x-slot> --}}
    <div class="grid grid-cols-4 m-1 text-lg text-center leading-loose">
    <span class="dark:text-white flex ">
        <span class="bg-blue-600 px-2 m-1 mr-2 text-white
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

            </div>

        @endforeach
</div>
</div>
</x-app-layout>
