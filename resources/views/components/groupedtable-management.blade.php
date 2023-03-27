<tr {{$attributes->merge(["class" => "border-b border-molveno-darkBlue"])}} >
    <td>{{ $id }}</td>
    <td>{{ $chairs }}</td>
    <td><button {{$attributes->merge(["class" => "text-white bg-molveno-darkBlue"])}}>Edit</button></td>
    <td><button {{$attributes->merge(["class" => "text-white bg-molveno-darkBlue"])}}>Delete</button></td>
</tr>
