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
                <div class="waitertable-<?php echo $loop->index + 1;?>" >
                    @foreach ($table as $t)

                        @php($statusColor = "border-green-600")
                        @php($st = $status[0]->status)
                        @if(!empty($t->reservation[0]))
                            @php(date_default_timezone_set('Europe/Amsterdam'))
                            @if (strtotime(date("Y-m-d H:i")) < strtotime($t->reservation[0]->reservation_time))
                                @php($statusColor = "border-amber-700")
                                @php($st = $status[2]->status)
                            @elseif (strtotime(date("Y-m-d H:i")) > strtotime($t->reservation[0]->reservation_time))
                                @php($statusColor = "border-red-600")
                                @php($st = $status[1]->status)
                            @endif
                        @endif

                        <x-waiter-table-groups
                        class="<?php echo $statusColor; ?>"
                        :id="$t->id"
                        :tableSectionId="$t->table_section_id"
                        :combined="$t->combined"
                        :comments="$t->comments"
                        :chairs="$t->chairs"
                        :status="$st"
                        :statusId="$t->status_id" />
                    @endforeach
                </div>
                @endforeach
            </div>

</x-app-layout>
