<tr {{$attributes->merge(["class" => "border-b border-molveno-darkBlue"])}} >
    <td>{{ $id }}</td>
    <td>{{ $chairs }}</td>
    <td>
        <x-edit-button></x-edit-button>
    </td>
    <td>
        <x-delete-button></x-delete-button>
    </td>
</tr>
