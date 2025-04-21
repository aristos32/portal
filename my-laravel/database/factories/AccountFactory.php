<?php

namespace Database\Factories;

use App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_number' => fake()->unique()->bankAccountNumber(),
            'customer_id' => Customer::factory(), // create also a Customer
            'balance' => fake()->numberBetween(1000, 100000),
            'is_active' => fake()->boolean(),
            'last_transaction_at' => fake()->dateTimeThisYear(),
            'notes' => fake()->sentence(),
            'currency' => 'USD',
        ];
    }
}
