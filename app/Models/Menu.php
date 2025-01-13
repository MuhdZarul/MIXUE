<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['Food_ID','Food_Name', 'Description', 'Price','image'];

    public function menu() {
        return $this->belongsTo(Menu::class);
    }


}
