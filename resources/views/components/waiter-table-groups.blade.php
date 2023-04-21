<div {{$attributes->merge(["class" => "m-2 inline-block w-20 max-w-1/3 h-28 text-white dark:text-white tablegroup flex flex-col justify-center items-center"])}}>
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
    <a class="bg-blue-600 hover:bg-molveno-lightBlue px-4 py-2 text-white rounded
        dark:text-white justify-start cursor-pointer " href="">
        details
    </a>
</div>

