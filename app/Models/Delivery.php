<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    public static function getProgressPercentage($status)
    {
        return match($status) {
            'Pending' => 0,
            'In Progress' => 50,
            'Completed' => 100,
            default => 0,
        };
    }
}
