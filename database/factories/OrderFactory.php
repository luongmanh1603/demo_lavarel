<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "full_name"=>$this->faker->name,
            "grand_total"=>0,
            "status"=>random_int(0,5),
            "user_id"=>random_int(1,10),
            "tel"=>$this->faker->phoneNumber,
            "address"=>$this->faker->address,
            "shipping_method"=>"express",
            "payment_method"=>"COD",
        ];
    }
}
