<?php

namespace Database\Seeders;

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
            WilayasTableSeeder::class,
            CommuneTableSeeder::class,
            Delivery_typeTableSeeder::class,
            Packages_statuseTableSeeder::class,
            StoreTableSeeder::class,
            PackageTableSeeder::class,
        ]);
    }
}
