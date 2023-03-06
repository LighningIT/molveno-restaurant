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
        @php($columnId ="")
        @if ($table->table_section_id == 1) 
            @php($columnId = "col-start-1 ")
            @elseif ($table->table_section_id == 2)
            @php($columnId = "col-start-2 ")
            @else
            @php($columnId = "col-start-3  ")
        @endif
        <x-tablegroups 
            class="<?php echo $columnId; ?>"
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
