<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Product::truncate();
        Schema::enableForeignKeyConstraints();

        Product::insert([
            'type' => Product::TYPE_SERVICE,
            'name' => 'Cuci Motor Full Service',
            'price' => 25000,
            'active' => true,
        ]);

        Product::insert([
            'type' => Product::TYPE_SERVICE,
            'name' => 'Cuci Mobil Kecil Full Service',
            'price' => 50000,
            'active' => true,
        ]);

        Product::insert([
            'type' => Product::TYPE_STOCKED,
            'name' => 'Le Minerale 600ml',
            'price' => 3000,
            'cost' => 2500,
            'active' => true,
            'uom' => 'botol',
            'category_id' => 2
        ]);
    }
}
