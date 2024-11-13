<?php

namespace Database\Factories;

use App\Models\Packages_statuse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Packages_statuse>
 */
class Packages_statuseFactory extends Factory
{
    protected $model = Packages_statuse::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'  => fake()->unique()->randomElement(['activate','desactivate']),
        ];
    }
}
