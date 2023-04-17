<div {{$attributes->merge(['class'=>'flex flex-col m-2 p-4 text-white dark:text-white bg-molveno-lightestBlue dark:bg-molveno-darkestBlue'])}}>
    <div class="flex justify-start w-full mb-2">
        <div class="flex flex-col gap-2">
            <p>{{$guest}}</p>
            <p>
                <span class="pr-4">
                    {{ date_create($reservationTime)->format('H:i') }}
                </span>
                <span>
                    {{ date_create($reservationTime)->format('d-m-Y') }}
                </span>
            </p>
        </div>
        <div class="self-end ml-auto mr-4">
            <p class="flex flex-col gap-2">
                <span class="ml-2 inline-block">
                    <img class="w-6 h-6 inline" src="{{ Vite::asset('resources/img/table_icon_125938.svg') }}" alt="table SVG"/>{{$tableNumber}}
                </span>
                <span class="mx-2 inline-block">
                    <img class="w-6 h-6 inline" src="{{ Vite::asset('resources/img/persons.svg') }}" alt="persons SVG"/> {{$numberPersons}}
                </span>
            </p>
        </div>
    </div>
    <div class="flex items-center gap-3 mt-2">
        <div class="flex justify-evenly gap-4">
            <div class="flex flex-col justify-center gap-1 w-fit">
                <a class="bg-molveno-blue hover:bg-molveno-lightBlue px-4 py-2 text-white rounded
                dark:text-white justify-start cursor-pointer" href="{{ route('reservationpages' , ['id' => $reservationId]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                </a>
            </div>
            <button class="ml-2 border border-white border-solid rounded py-1 px-4" for="checkedIn">Check-in</button>

            <form action="/reservations/edit{{$reservationId}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-600 px-4 py-2 text-white rounded hover:bg-red-500 dark:text-white justify-start cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
