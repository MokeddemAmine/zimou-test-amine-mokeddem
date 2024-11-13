<?php

namespace Database\Factories;

use App\Models\Delivery_type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery_type>
 */
class Delivery_typeFactory extends Factory
{
    protected $model = Delivery_type::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'  => fake()->unique()->randomElement(['a domicile',"dand le bureau de l'entreprise"]),
        ];
    }
}
