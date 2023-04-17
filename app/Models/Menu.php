<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

  /*   public function menucategory() : BelongsTo {
        return $this->belongsTo(MenuCategory::class);
    }

    public function menuitem() : BelongsTo {
        return $this->belongsTo(MenuItem::class);
    } */

    public function menuMealType() : HasMany{
        return $this->hasMany(MenuMealType::class)->with('categories');
    }

    public static function getMenu() {
        return Menu::with('menuMealType')->get();
    }

}
