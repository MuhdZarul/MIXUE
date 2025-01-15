<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('order_items', function (Blueprint $table) {
        $table->unsignedBigInteger('food_id')->change(); // Modify column if necessary
    });
}



public function down()
{
    Schema::table('order_items', function (Blueprint $table) {
        $table->renameColumn('food_id', 'menu_id');
    });
}
};
