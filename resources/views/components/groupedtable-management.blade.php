<tr {{$attributes->merge(["class" => "border-b border-molveno-darkBlue"])}} value="" >
    <td>{{ $id }}</td>
    <td>{{ $chairs }}</td>
    <td>
        <x-edit-button data-type="edit"></x-edit-button>
    </td>
    <td>
        <x-delete-button data-type="delete" ></x-delete-button>
    </td>
</tr>
