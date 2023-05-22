<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public static function getAllUsers(Request $request) {
        if ($request->user()->can('view', Admin::class)) {
            return view('adminoverview', [
                'users' => Admin::getAllUsers(),
                'roles' => Admin::getAllRoles()
            ]);
        } else {
            return view('dashboard');
        }
    }

    public static function create() {

    }

    public static function store() {

    }

    public static function update(Request $request) {
        if (is_numeric($request->id)) {
            $user = User::getUserById($request->id);

            if (!empty($request->name) && $request->name != $user->name) {
                $user->update([
                    'name' => $request->name
                ]);
            }

            if (!empty($request->username) && $request->username != $user->username) {
                $user->update([
                    'user_name' => $request->username
                ]);
            }

            if (!empty($request->role) && $request->role != $user->role->role) {
                $user->update([
                    'user_roles_id' => $request->role
                ]);
            }

            if (!empty($request->email) && $request->email != $user->email) {
                $user->update([
                    'email' => $request->email
                ]);
            }

            if (!empty($request->newpw) && $request->newpw != $user->password && $request->confirmpw == $request->newpw) {
                $user->update([
                    'password' => bcrypt($request->newpw)
                ]);
            }
        }
        return $request;
    }

    public static function destroy(Request $request) {
        Admin::destroy($request->id);
    }
}
