<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\UserRoles;

class Admin extends Model
{
    use HasFactory;

    public static function getAllUsers() {
        return User::with('role')->get();
    }

    public static function getAllRoles() {
        return UserRoles::get();
    }

    public static function destroy($id) {
        User::where('id', $id)->delete();
    }


}
