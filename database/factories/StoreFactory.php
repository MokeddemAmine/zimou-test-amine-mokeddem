<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    protected $model = Store::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code'          => fake()->unique()->randomNumber(5),
            'name'          => fake()->company(),
            'email'         => fake()->unique()->companyEmail(),
            'phones'        => fake()->unique()->phoneNumber(),
            'company_name'  => fake()->company(),
            'capital'       => fake()->state(),
            'address'       => fake()->address(),
            'register_commerce_number' => fake()->unique()->randomNumber(9),
            'nif'           => fake()->unique()->randomNumber(8),
            'legal_form'    => fake()->randomElement([0,1,2,3]),
            'status'        => fake()->randomElement([0,1]),
            'can_update_preparing_packages' => fake()->randomElement([0,1]),
        ];
    }
}
