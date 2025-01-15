<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Check if the column 'food_id' does not exist
            if (!Schema::hasColumn('order_items', 'food_id')) {
                $table->unsignedBigInteger('food_id')->nullable(false)->after('some_column'); // Adjust 'some_column' to the correct column name
            }
        });

    }

    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Re-add 'menu_id' if rollback is needed
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('menu_id')->on('menus')->onDelete('cascade');

            // Drop 'food_id' column
            $table->dropForeign(['food_id']);
            $table->dropColumn('food_id');
        });
    }
}
