<?php

namespace Database\Factories;

use App\Models\commune;
use App\Models\Wilaya;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\commune>
 */
class communeFactory extends Factory
{
    protected $model = commune::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $wilaya = Wilaya::inRandomOrder()->first();
        return [
            'name' => fake()->city(),
            'wilaya_id' => $wilaya->id,
        ];
    }
}
