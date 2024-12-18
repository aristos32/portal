<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Contract;

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
            'user_id' => User::factory(),
            'number' => fake()->numberBetween(1, 10000),
            'description' => fake()->paragraph,
            'balance' => fake()->numberBetween(1, 10000),
            'is_active' => fake()->boolean(0.5),
            'notes' => fake()->randomDigitNotZero(),
            'last_transaction_at' => fake()->dateTimeThisYear(),
            'start_date' => fake()->date('Y-m-d', now()),
            'expiry_date' => fake()->date('Y-m-d', now()->addMonths(12)),
        ];
    }
}
