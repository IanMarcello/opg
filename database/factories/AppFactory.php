<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\App>
 */
class AppFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(50),
            'disburse_account' => fake()->creditCardNumber(),
            'disburse_mno' => fake()->randomElement(['MPESA', 'AirtelMoney']),
            'disburse_bank' => fake()->randomElement(['CRDB', 'NMB']),
            'user_id' => fake()->randomDigitNotNull(),
        ];
    }
}
