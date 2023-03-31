<div {{$attributes->merge(["class" => "m-2 inline-block w-28 max-w-1/3 h-28 text-white dark:text-white tablegroup"])}} data-status-id="{{$statusId}}">
    <p>id: {{ $id }} </p>
    <p>section: {{ $tableSectionId }} </p>
    {{-- <p>combined{{ $combined }} </p> --}}
    {{-- <p>comments: {{ $comments }}</p> --}}
    <p>chairs: {{ $chairs }}</p>
    <p class="mb-3">status: {{ $status }}</p>
    <a class="bg-blue-600 hover:bg-molveno-lightBlue px-4 py-2 text-white rounded
        dark:text-white justify-start cursor-pointer " href="">
        details
    </a>
</div>
