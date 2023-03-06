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
<div class="flex flex-wrap col-span-3">
        @foreach ($tables as $table)
        <x-tablegroups
            class="bg-red-50"
            :id="$table->id"
            :tableSectionId="$table->table_section_id"
            :combined="$table->combined"
            :comments="$table->comments"
            :chairs="$table->chairs"
            :statusId="$table->status_id" />
        @endforeach
</div>
</div>
</x-app-layout>
