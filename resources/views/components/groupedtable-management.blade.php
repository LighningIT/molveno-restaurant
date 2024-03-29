<tr {{$attributes->merge(["class" => "border-b border-molveno-darkBlue"]  )}}>
    <td data-id="{{ $id }}">{{ $id }}</td>
    <td class="flex">
        <x-button-count class="minus">-</x-button-count>
        <input disabled type="text" name="chair-amount" class="chair-amount" value="{{ $chairs }}" size="1">
        <x-button-count class="plus">+</x-button-count>
    </td>
    <td><x-in-button class="add-all"/></td>
    <td><x-reset-all-chairs-button class="reset-all-chairs"/></td>
    <td><x-delete-button class="deleteBTN"/></td>
</tr>

