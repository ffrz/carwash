<?php

namespace Database\Seeders;

use App\Models\CashTransaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CashTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        CashTransaction::truncate();
        Schema::enableForeignKeyConstraints();

        CashTransaction::insert(['account_id' => 1, 'category_id' => 1, 'datetime' => '2023-11-01 08:00:00', 'amount' =>  1500000, 'description' => 'Saldo Awal']);
    }
}
