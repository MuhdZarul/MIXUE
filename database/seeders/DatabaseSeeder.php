<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Run the seeders
        $this->call([
            TransactionSeeder::class,
        ]);
    }
}
