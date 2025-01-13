<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    protected $primaryKey = 'order_id'; // Primary key is order_id (string)
    public $incrementing = false; // Because order_id is not auto-incrementing
    protected $keyType = 'string'; // Order ID is a string
    protected $fillable = ['order_id', 'cust_id', 'cart_price', 'delivery_id', 'order_status'];

    //protected static function boot()
    //{
    //    parent::boot();

    //    static::creating(function ($model) {
    //        if (empty($model->order_id)) {
                // Generating a custom order_id based on a unique identifier
    //            $model->order_id = 'ORD-' . strtoupper(uniqid());
    //        }
    //    });
    //}

    // Relationships to associated models
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'cust_id', 'cust_id'); // Transaction belongs to Customer
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'food_id', 'food_id'); // Transaction belongs to Food
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'cart_id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id', 'delivery_id'); // Transaction belongs to Delivery
    }
}
