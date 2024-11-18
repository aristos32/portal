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
            'name' => $this->faker->name,
            'user_id' => User::factory(),
            'number' => $this->faker->numberBetween(1, 10000),
            'description' => $this->faker->paragraph,
            'balance' => $this->faker->numberBetween(1, 10000),
            'is_active' => $this->faker->boolean(0.5),
            'notes' => $this->faker->randomDigitNotZero(),
            'last_transaction_at' => fake()->dateTimeThisYear(),
        ];
    }
}
