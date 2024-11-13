<?php

namespace Database\Seeders;

use App\Models\Packages_statuse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Packages_statuseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Packages_statuse::factory()->count(2)->create();
    }
}
