<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $customers = DB::table('customers')->pluck('cust_id')->toArray();
        $menus = DB::table('menus')->pluck('food_id')->toArray();
        $deliveries = DB::table('deliveries')->pluck('delivery_id')->toArray();

        DB::table('transactions')->insert([
            [
                'order_id' => 1,
                'cust_id' => $customers[0],
            //    'food_id' => $menus[0],
            //    'food_price' => 20.50,
                'cart_price' => 50.00,
                'delivery_id' => $deliveries[0],
                'order_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2,
                'cust_id' => $customers[1],
            //    'food_id' => $menus[1],
            //    'food_price' => 15.75,
                'cart_price' => 30.00,
                'delivery_id' => $deliveries[1],
                'order_status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 3,
                'cust_id' => $customers[2],
                'cart_price' => 40.00,
                'delivery_id' => $deliveries[2],
                'order_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 4,
                'cust_id' => $customers[3],
                'cart_price' => 25.00,
                'delivery_id' => $deliveries[3],
                'order_status' => 'cancelled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 5,
                'cust_id' => $customers[4],
                'cart_price' => 60.00,
                'delivery_id' => $deliveries[4],
                'order_status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 6,
                'cust_id' => $customers[5],
                'cart_price' => 35.00,
                'delivery_id' => $deliveries[5],
                'order_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 7,
                'cust_id' => $customers[6],
                'cart_price' => 45.00,
                'delivery_id' => $deliveries[6],
                'order_status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 8,
                'cust_id' => $customers[7],
                'cart_price' => 55.00,
                'delivery_id' => $deliveries[7],
                'order_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 9,
                'cust_id' => $customers[8],
                'cart_price' => 20.00,
                'delivery_id' => $deliveries[8],
                'order_status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 10,
                'cust_id' => $customers[9],
                'cart_price' => 70.00,
                'delivery_id' => $deliveries[9],
                'order_status' => 'cancelled',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
