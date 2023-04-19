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
        <table class="col-span-10 col-start-2 mt-8">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>username</th>
                    <th>role</th>
                    <th>email</th>
                    <th>password</th>
                    <th>created</th>
                    <th>updated</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="user-table">
            @foreach ($users as $user)
                <tr>
                    <td><input type="text" size="3" name="id" disabled value="{{$user->id}}"
                            class="border-none bg-inherit table-cell" /></td>
                    <td><input type="text" name="name" size="15" disabled value="{{ $user->name }}"
                        class="border-none bg-inherit table-cell" /></td>
                        <td><input type="text" size="10" name="username" disabled value="{{ $user->username }}"
                            class="border-none bg-inherit table-cell" /></td>
                    <td><input type="text" size="10" name="role" disabled value="{{ $user->role->role }}"
                        class="border-none bg-inherit table-cell" /></td>
                    <td><input type="text" size="20" name="email" disabled value="{{ $user->email }}"
                        class="border-none bg-inherit table-cell" /></td>
                    <td><input type="text" size="5" name="password" disabled value="{{ $user->password }}"
                        class="border-none bg-inherit table-cell" /></td>
                    <td><input type="text" size="12" name="created" disabled value="{{ date_create($user->created_at)->format('H:i d-m-Y') }}"
                        class="border-none bg-inherit table-cell" /></td>
                    <td><input type="text" size="12" name="updated" disabled value="{{ date_create($user->updated_at)->format("H:i d-m-Y") }}"
                        class="border-none bg-inherit table-cell" /></td>
                    <td><x-edit-button class="edit-user" />
                        <x-save-button class="save-user hidden" />
                    </td>
                    <td><x-delete-button class="delete-user" /></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
