<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getOrders() {
        return Order::get();
    }

    public function tablesection() : HasMany{
        return $this->hasMany(TableSection::class);
    }

    public function ordertype() : HasMany{
        return $this->hasMany(OrderType::class);
    }

    public function orderstatus() : HasMany{
        return $this->hasMany(OrderStatus::class);
    }

}
