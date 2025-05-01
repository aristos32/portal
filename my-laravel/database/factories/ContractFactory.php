<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'customer_id' => Customer::factory(),
            'number' => fake()->unique()->numberBetween(1, 1000),
            'description' => fake()->paragraph,
            'balance' => fake()->numberBetween(1, 1000000),
            'is_active' => fake()->boolean(0.5),
            'notes' => fake()->randomDigitNotZero(),
            'last_transaction_at' => fake()->dateTimeThisYear(),
            'start_date' => fake()->date('Y-m-d', now()),
            'expiry_date' => fake()->date('Y-m-d', now()->addMonths(12)),
        ];
    }
}
