<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
        
    }

    public static function destroy(Request $request) {
        Admin::destroy($request->id);
    }
}
