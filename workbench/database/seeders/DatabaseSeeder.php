<?php

namespace Database\Seeders;

use App\Models\TestUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TestUser::factory()
            ->count(10)
            ->create();
    }
}
