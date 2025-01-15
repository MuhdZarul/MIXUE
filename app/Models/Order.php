<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = ['user_id', 'total_price'];

    /**
     * Relationship: An Order has many OrderItems.
     */
    public function items() {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
