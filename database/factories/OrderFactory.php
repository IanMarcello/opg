<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'pay_number' => fake()->lexify('ODR-??????'),
            'third_party_id' => fake()->lexify('?????'),
            'total_amount' => fake()->randomFloat(0, 50000, 1000000),
            'remark' => fake()->sentence(),
            'mno' => fake()->randomElement(['MPESA', 'AirtelMoney']),
            'buyer' => fake()->name(),
        ];
    }
}
