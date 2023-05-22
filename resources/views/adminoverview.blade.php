<x-app-layout>
    @vite(['resources/js/alterUsers.js'])

    <div class="h-auto grid grid-cols-12">
        <x-popup-modal class="gap-10" id="deleteModal">
            <p class="pt-8">Are you certain you wish to delete this user?</p>

            <div class="flex flex-row justify-around">
                <x-delete-button>
                    Delete
                </x-delete-button>
            </div>
        </x-popup-modal>

        <x-popup-modal class="gap-10" id="passwordModal">
            <p class="pt-8">Change password for this user?</p>
            <div class="flex justify-end py-4">
                <label class="dark:text-black mr-2">New password</label>
                <x-text-input type="password" name="new-pw" id="new-pw" />
            </div>
            <div class="flex justify-end py-4">
                <label class="dark:text-black mr-2">Confirm password</label>
                <x-text-input type="password" name="confirm-pw" id="confirm-pw" />
            </div>
            <div class="flex flex-row justify-around">
                <x-add-button>
                    new password
                </x-add-button>
            </div>
        </x-popup-modal>

        <div class="col-start-12">
            <x-add-button id="add-new-user" />
        </div>

        <table class="col-span-10 col-start-2 mt-8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="user-table">
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <input type="text" size="3" name="id" disabled value="{{ $user->id }}"
                                class="border-none bg-inherit table-cell" />
                        </td>
                        <td>
                            <input type="text" name="name" size="15" disabled value="{{ $user->name }}"
                                class="border-none bg-inherit table-cell" />
                        </td>
                        <td>
                            <input type="text" size="10" name="username" disabled value="{{ $user->username }}"
                                class="border-none bg-inherit table-cell" />
                        </td>
                        <td>
                            <select name="role" class="border-none bg-inherit table-cell" disabled>
                                @foreach ($roles as $role)
                                    @if ($role->role == $user->role->role)
                                        <option value="{{ $role->role }}" selected>{{ $role->role }}</option>
                                    @else
                                        <option value="{{ $role->role }}">{{ $role->role }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" size="20" name="email" disabled value="{{ $user->email }}"
                                class="border-none bg-inherit table-cell" />
                        </td>
                        <td>
                            <x-danger-button class="change-password" >pw</x-danger-button>
                        </td>
                        <td>
                            <input type="text" size="12" name="created" disabled
                                value="{{ date_create($user->created_at)->format('H:i d-m-Y') }}"
                                class="border-none bg-inherit table-cell" />
                        </td>
                        <td>
                            <input type="text" size="12" name="updated" disabled
                                value="{{ date_create($user->updated_at)->format('H:i d-m-Y') }}"
                                class="border-none bg-inherit table-cell" />
                        </td>
                        <td>
                            <x-edit-button class="edit-user" />
                            <x-save-button class="save-user hidden" />
                        </td>
                        <td>
                            <x-delete-button class="delete-user" />
                            <x-cancel-button class="cancel hidden" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
