<x-app-layout>

    @vite(['resources/css/app.css', 'resources/css/waiteroverview.css', 'resources/js/app.js'])

    <!-- <div class="col-span-full grid grid-cols-9 m-1 mr-4 text-lg text-center leading-loose"> -->
    <div class="levelandterrace">
        <span class="upperlevel">Upper Level</span>
        <span class="lowerlevel">Lower Level</span>
        <span class="terrace">Terrace</span>
    </div>
    <div class="waiteroverview">
        @foreach ($tables as $table)
            <div class="<?php echo $loop->index + 1; ?>">
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
                        <x-waiter-table-groups
                        class="<?php echo $statusColor; ?> p-4 w-auto h-auto"
                        :id="$t->id"
                        :tableSectionId="$t->table_section_id"
                        :combined="$t->combined"
                        :comments="$t->comments"
                        :chairs="$t->chairs"
                        />
                    
                @endforeach
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
