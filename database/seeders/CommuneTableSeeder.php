<?php

namespace Database\Seeders;

use App\Models\commune;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommuneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        commune::factory()->count(100)->create();
    }
}
