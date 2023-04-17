<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categories() : BelongsTo {
        dd('test');
        return $this->belongsTo(MenuCategory::class);
    }

    public static function getMenuItem() {
        return MenuItem::get();
    }

}
