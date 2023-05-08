<tr {{$attributes->merge(["class" => "border-b border-molveno-darkBlue"])}} value="" >
    <td>{{ $id }}</td>
    <td class="flex">
        <x-button-count id="minus">-</x-button-count>
        <input disabled type="text" name="chair-amount" id="chair-amount" value="{{ $chairs }}" size="3">
        <x-button-count id="plus">+</x-button-count>
    </td>
</tr>
