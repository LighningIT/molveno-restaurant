<tr {{$attributes->merge(["class" => "border-b border-molveno-darkBlue"])}} value="" >
    <td>{{ $id }}</td>
    <td class="flex">
        <x-button-count class="minus">-</x-button-count>
        <input disabled type="text" name="chair-amount" class="chair-amount" value="{{ $chairs }}" size="3">
        <x-button-count class="plus">+</x-button-count>
    </td>
</tr>
