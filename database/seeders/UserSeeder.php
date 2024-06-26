<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::insert([
            'username' => 'admin',
            'password' => Hash::make('12345'),
            'is_active' => true,
            'is_admin' => true,
            'fullname' => 'Administrator',
            //'is_super_user' => true,
            //'group_id' => 11,
        ]);
        User::insert([
            'username' => 'kasir',
            'password' => Hash::make('12345'),
            'is_active' => true,
            'is_admin' => false,
            'fullname' => 'Kasir',
            //'group_id' => 1,
        ]);
    }
}
