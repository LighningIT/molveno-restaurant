<x-app-layout>

    <div class="col-span-full grid grid-cols-9 m-1 mr-4 text-lg text-center leading-loose">
        <span class="dark:text-white col-span-1">Upper Level</span>
        <span class="dark:text-white col-span-3">Lower Level</span>
        <span class="dark:text-white col-span-5">Terrace</span>
    </div>
    <div class="flex">
        @foreach ($tables as $table)
            <div class="flex flex-wrap justify-start items-center max-h-[87vh] col-start-<?php echo $loop->index + 1;?>" >
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
                        <x-table-groups-waiter
                        class="<?php echo $statusColor; ?> p-4 w-auto h-auto"
                        :id="$t->id"
                        :tableSectionId="$t->table_section_id"
                        :combined="$t->combined"
                        :comments="$t->comments"
                        :chairs="$t->chairs"
                        :status="$t->status->status"
                        :statusId="$t->status_id" 
                        />
                    
                @endforeach
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
