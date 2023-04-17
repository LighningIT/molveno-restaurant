<x-app-layout>
    @vite(['resources/js/alterUsers.js'])
    <div class="h-auto grid grid-cols-12">
        <x-popup-modal class="flex flex-col gap-10" id="deleteModal">
            <p class="pt-8">Are you certain you wish to delete this user?</p>

            <div class="flex flex-row justify-around">
                <x-delete-button>
                    Delete
                </x-delete-button>
            </div>
        </x-popup-modal>
        <table  class="col-span-10 col-start-2 my-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>role</th>
                    <th>email</th>
                    <th>password</th>
                    <th>created</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="user-table">
            @foreach ($users as $user)
                <tr>
                    <td><input type="text" size="5" disabled value="{{$user->id}}"
                            class="border-none bg-inherit"/></td>
                    <td><input type="text" size="5" disabled value="{{ $user->name }}"
                        class="border-none bg-inherit"/></td>
                    <td><input type="text" size="5" disabled value="{{ $user->role->role }}"
                        class="border-none bg-inherit"/></td>
                    <td><input type="text" size="5" disabled value="{{ $user->email }}"
                        class="border-none bg-inherit"/></td>
                    <td><input type="text" size="5" disabled value="{{ $user->password }}"
                        class="border-none bg-inherit"/></td>
                    <td><input type="text" size="5" disabled value="{{ $user->created_at }}"
                        class="border-none bg-inherit"/></td>
                    <td><x-edit-button class="edit-user"/></td>
                    <td><x-delete-button class="delete-user" /></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
