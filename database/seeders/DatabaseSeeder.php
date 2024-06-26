<?php

namespace Database\Seeders;

use App\Models\CashTransactionCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //UserGroupSeeder::class,
            UserSeeder::class,
            CashAccountSeeder::class,
            CashTransactionCategorySeeder::class,
            CashTransactionSeeder::class,
            CostCategorySeeder::class,
            CostSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
