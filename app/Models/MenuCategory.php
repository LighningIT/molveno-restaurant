<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function mealType() : BelongsTo {
        return $this->belongsTo(MenuMealType::class);
    }

    public function menuItems() : HasMany {
        return $this->hasMany(MenuItem::class);
    }

    public static function getMenuCategories() {
        return MenuCategory::with('menuItems')->get();
    }

}
