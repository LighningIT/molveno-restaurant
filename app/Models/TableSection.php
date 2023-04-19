<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableSection extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function order() : BelongsTo {
        return $this->belongsTo(Order::class);
    }

}
