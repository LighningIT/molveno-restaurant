<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class MenuMealType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function menu() : BelongsTo {
        return $this->belongsTo(Menu::class);
    }

    public function categories() : hasMany {
        return $this->hasMany(MenuCategory::class)->with('menuItems');
    }

    public static function getMenuMealType() {
        return MenuMealType::with('categories')->get();
    }
}
