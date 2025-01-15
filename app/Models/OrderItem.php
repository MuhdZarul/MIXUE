<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {
    use HasFactory;

    // Allow mass assignment for these fields
    //betulkn
    protected $fillable = ['order_id', 'menu_id', 'quantity'];

    /**
     * Relationship: An OrderItem belongs to an Order.
     */
    public function order() {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Relationship: An OrderItem belongs to a Menu item.
     */
    public function menu() {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

}
