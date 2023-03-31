 <div {{$attributes->merge(["class" => "m-2 inline-block w-28 max-w-1/3 h-28 text-white dark:text-white tablegroup flex flex-col justify-center items-center"])}}
        data-status-id="{{$statusId}}">
    <p>
        <img class="w-6 h-6 inline" src="{{ Vite::asset('resources/img/table_icon_125938.svg') }}" alt="table SVG"/>
        <span class="ml-2">
            {{$id}}
        </span>
     </p>
    {{-- <p>{{ $tableSectionId }} </p> --}}
    <p>
        <img class="w-6 h-6 inline" src="{{ Vite::asset('resources/img/people.png') }}" alt="table SVG"/>
        <span class="ml-2">
            {{ $chairs }}
        </span>
    </p>
    {{-- <p>{{ $status }}</p> --}}
</div>
