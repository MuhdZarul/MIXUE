<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('order_id');
            //$table->string('order_id')->unique();
            $table->unsignedBigInteger('cust_id'); // Foreign Key (customer)
        //    $table->unsignedBigInteger('food_id'); // Foreign Key (food)
        //    $table->decimal('food_price', 8, 2); // Food price in RM
            $table->decimal('cart_price', 8, 2); // Cart price in RM
            $table->unsignedBigInteger('delivery_id'); // Foreign Key (delivery)
            $table->string('order_status');
            $table->timestamps();

            $table->foreign('cust_id')->references('cust_id')->on('customers')->onDelete('cascade');
        //    $table->foreign('food_id')->references('food_id')->on('menus')->onDelete('cascade');
            $table->foreign('delivery_id')->references('delivery_id')->on('deliveries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
