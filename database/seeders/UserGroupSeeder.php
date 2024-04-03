<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        UserGroup::truncate();
        Schema::enableForeignKeyConstraints();

        UserGroup::insert(['id' => 1, 'name' => 'Client']);
        UserGroup::insert(['id' => 11, 'name' => 'System Administrator']);
        UserGroup::insert(['id' => 12, 'name' => 'Maintainer']);
        UserGroup::insert(['id' => 13, 'name' => 'Owner']);
        UserGroup::insert(['id' => 14, 'name' => 'Administrator']);
        UserGroup::insert(['id' => 15, 'name' => 'Kasir']);
    }
}
