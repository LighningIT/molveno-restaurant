<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public static function getAllUsers() {
        return view('adminoverview', [
            'users' => Admin::getAllUsers(),
            'roles' => Admin::getAllRoles()
        ]);
    }

    public static function create() {

    }

    public static function store() {

    }

    public static function update(Request $request) {
        if (is_numeric($request->id)) {
            $user = User::getUserById($request->id);

            if ($request->name != $user->name) {

            }

            if ($request->username != $user->username) {

            }

            if ($request->role != $user->role) {

            }


        }
        return $request;
    }

    public static function destroy(Request $request) {
        Admin::destroy($request->id);
    }
}
