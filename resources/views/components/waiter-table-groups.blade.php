<div {{$attributes->merge(["class" => "m-1.5 inline-block h-32 p-1.5 rounded bg-slate-200
    tablegroup flex flex-col justify-center items-center border-8 border-solid"])}}
        data-status-id="{{$statusId}}">
    <p>
        <img class="w-6 h-6 inline" src="{{ Vite::asset('resources/img/table_icon_125938.svg') }}" alt="table SVG"/>
        <span class="ml-2">
            {{$id}}
        </span>
     </p>
    <p class="peoplep">
        <img class="peopleimg" src="{{ Vite::asset('resources/img/people.png') }}" alt="table SVG"/>
        <span class="ml-2">
            {{ $chairs }}
        </span>
    </p>
    <a class="detailbutton" href="">
        Details
    </a>
</div>


