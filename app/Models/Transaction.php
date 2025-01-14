<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'transaction_id'; // Primary key is transaction_id
    public $incrementing = false; // transaction_id is not auto-incrementing
    protected $keyType = 'string'; // transaction_id is a string
    protected $fillable = ['transaction_id', 'user_id', 'order_id', 'total_price', 'delivery_id', 'status'];

    // Relationships to associated models
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Transaction belongs to Order
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id'); // Transaction belongs to Order
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id', 'id'); // Transaction belongs to Delivery
    }
}
