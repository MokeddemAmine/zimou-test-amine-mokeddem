<?php

namespace Database\Seeders;

use App\Models\Delivery_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Delivery_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Delivery_type::factory()->count(2)->create();
    }
}
