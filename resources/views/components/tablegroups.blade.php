<div {{$attributes->merge(["class" => "m-2 inline-block w-1/3 text-white dark:text-white"])}}>
    <p>id: {{ $id }} </p>
    <p>section: {{ $tableSectionId }} </p>
    {{-- <p>combined{{ $combined }} </p> --}}
    {{-- <p>comments: {{ $comments }}</p> --}}
    <p>chairs: {{ $chairs }}</p>
    <p>status: {{ $statusId }}</p>
</div>
