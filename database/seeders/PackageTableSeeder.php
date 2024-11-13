<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::all()->each(function ($store) {
            Package::factory()->count(100)->create([
                'store_id' => $store->id,
            ]);
        });
    }
}
