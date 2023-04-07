 <div {{$attributes->merge(["class" => "m-2 inline-block w-28 max-w-1/3 h-28 rounded bg-slate-200
    tablegroup flex flex-col justify-center items-center border-8 border-solid"])}}
        data-status-id="{{$statusId}}">
    <p>
        <img class="w-6 h-6 inline" src="{{ Vite::asset('resources/img/table_icon_125938.svg') }}" alt="table SVG"/>
        <span class="ml-2">
            {{$id}}
        </span>
     </p>
    <p>
        <img class="w-6 h-6 inline" src="{{ Vite::asset('resources/img/people.png') }}" alt="table SVG"/>
        <span class="ml-2">
            {{ $chairs }}
        </span>
    </p>

</div>
