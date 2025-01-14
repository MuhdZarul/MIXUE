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
            $table->id('transaction_id'); // Primary Key
            $table->unsignedBigInteger('order_id'); // Foreign Key (order)
            $table->unsignedBigInteger('user_id'); // Add user_id column
            $table->decimal('total_price', 8, 2); // Total price in RM
            $table->unsignedBigInteger('delivery_id'); // Foreign Key (delivery)
            $table->string('status'); // Status of the transaction (e.g., pending, completed, etc.)
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
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
