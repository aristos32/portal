<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trade>
 */
class TradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contract_id' => fake()->numberBetween(1, 100),
            'amount' => fake()->randomFloat(2, 100, 10000),
            'type' => fake()->randomElement(['deposit', 'withdrawal']),
            'description' => fake()->sentence,
            'notes' => fake()->paragraph,
            'transaction_date' => fake()->dateTimeThisYear,
        ];
    }
}
