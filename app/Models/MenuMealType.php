<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuMealType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public static function getMenuMealType() {
        return MenuMealType::get();
    }
}
