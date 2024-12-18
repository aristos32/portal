<?php

namespace Database\Factories;

use App\Models\Contract;
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
    public function definition(): array
    {
        return [
            'contract_id' => Contract::factory(),
            'amount' => fake()->randomFloat(2, 100, 10000),
            'type' => fake()->randomElement(['deposit', 'withdrawal']),
            'description' => fake()->sentence,
            'notes' => fake()->paragraph,
            'transaction_date' => fake()->dateTimeThisYear,
            'currency' => 'USD',
            'status' => fake()->randomElement(['pending', 'completed', 'failed']),
        ];
    }
}
