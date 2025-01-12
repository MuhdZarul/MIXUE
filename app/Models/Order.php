<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'total_price'];

    public function items() {
        return $this->belongsToMany(Item::class, 'order_items')->withPivot('quantity');
    }
}
