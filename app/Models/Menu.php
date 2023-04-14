<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function menucategory() : BelongsTo {
        return $this->belongsTo(MenuCategory::class);
    }

    public function menuitem() : BelongsTo {
        return $this->belongsTo(MenuItem::class);
    }

    public function menumealtype() : BelongsTo {
        return $this->belongsTo(MenuMealType::class);
    }

}
