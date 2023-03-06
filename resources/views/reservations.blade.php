<x-app-layout>
<div class="grid grid-cols-4">
<div class="dark:text-white">
  @foreach ($reservations as $reservation)

  <x-reservation-item
  :guest="$reservation->guest_id"
  :reservationTime="$reservation->created_at"
  :tableNumber="$reservation->grouped_table_id"
  :numberPersons="$reservation->num_persons"
  />
  @endforeach
</div>
<div class="grid grid-cols-3 col-span-3">
        @foreach ($tables as $table)
            <div class="flex flex-col col-start-<?php echo $loop->index + 1;?>" >
                @foreach ($table as $t)
                    <x-tablegroups
                    class="bg-red-50"
                    :id="$t->id"
                    :tableSectionId="$t->table_section_id"
                    :combined="$t->combined"
                    :comments="$t->comments"
                    :chairs="$t->chairs"
                    :statusId="$t->status_id" />
                @endforeach

            </div>

        @endforeach
</div>
</div>
</x-app-layout>
