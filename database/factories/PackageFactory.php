<?php

namespace Database\Factories;

use App\Models\commune;
use App\Models\Delivery_type;
use App\Models\Package;
use App\Models\Packages_statuse;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    protected $model = Package::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $commune = commune::inRandomOrder()->first();
        $delivery_type = Delivery_type::inRandomOrder()->first();
        $status = Packages_statuse::inRandomOrder()->first();
        $store = Store::inRandomOrder()->first();
        $name = fake()->randomElement([0,1]);
        $phone2 = fake()->randomElement([0,1]);
        $cod_to_pay = fake()->randomElement([0,fake()->randomFloat(2,1,100)]);
        $commission = fake()->randomElement([0,fake()->randomFloat(2,1,20)]);
        $free_delivery = fake()->randomElement([0,1]);
        $delivery_price = fake()->randomFloat(2,5,30);
        $price = fake()->randomFloat(2,1,100);
        $packaging_price = fake()->randomNumber(2);
        $partner_cod_price = fake()->randomFloat(2,0,100);
        $partner_delivery_price = fake()->randomNumber(2);
        $partner_return = fake()->randomFloat(2,1,20);
        $price_to_pay = ($free_delivery?0:$delivery_price) + $price + $packaging_price;
        $return_price = fake()->randomNumber(2);
        $total_price = $price_to_pay - $return_price;

        return [
            'uuid'              => fake()->unique()->uuid(),
            'tracking_code'     => fake()->unique()->uuid(),
            'commune_id'        => $commune->id,
            'delivery_type_id'  => $delivery_type->id,
            'status_id'         => $status->id,
            // 'store_id'          => $store->id,
            'address'           => fake()->address(),
            'can_be_opened'     => fake()->randomElement([0,1]),
            'name'              => $name?fake()->name():null,
            'client_first_name' => fake()->firstName(),
            'client_last_name'  => fake()->lastName(),
            'client_phone'      => fake()->phoneNumber(),
            'client_phone2'     => $phone2?fake()->phoneNumber():null,
            'cod_to_pay'        => $cod_to_pay,
            'commission'        => $commission,
            'delivery_price'    => $free_delivery?0:$delivery_price,
            'extra_weight_price'=> fake()->randomNumber(2),
            'free_delivery'     => $free_delivery,
            'packaging_price'   => $packaging_price,
            'partner_cod_price' => $partner_cod_price,
            'partner_delivery_price'=> $partner_delivery_price,
            'partner_return'    => $partner_return,
            'price'             => $price,
            'price_to_pay'      => $price_to_pay,
            'return_price'      => $return_price,
            'total_price'       => $total_price,
            'weight'            => fake()->randomNumber(4),
        ];
    }
}
