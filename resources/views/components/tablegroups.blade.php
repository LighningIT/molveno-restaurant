
 <div {{$attributes->merge(["class" => "m-2 text-white dark:text-white tablegroup"])}} data-status-id="{{$statusId}}">
    <p>{{ $id }} </p>
    <p>section: {{ $tableSectionId }} </p>
    {{-- <p>combined{{ $combined }} </p> --}}
    {{-- <p>comments: {{ $comments }}</p> --}}
    <p>chairs: {{ $chairs }}</p>
    <p>status: {{ $status }}</p>
</div>
