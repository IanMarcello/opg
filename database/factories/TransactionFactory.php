<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
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
            'third_party_id' => fake()->lexify('?????'),
            'amount' => fake()->randomFloat(0, 50000, 1000000),
            'remark' => fake()-> sentence(),
        ];
    }
}
