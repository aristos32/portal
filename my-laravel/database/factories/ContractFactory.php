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

        $start = fake()->dateTimeBetween('2000-01-01', 'now + 1 year');

        return [
            'name' => fake()->name,
            'customer_id' => Customer::factory(),
            'number' => fake()->unique()->bothify('??-########'), // inique string
            'description' => fake()->paragraph,
            'balance' => fake()->numberBetween(1, 1000000),
            'notes' => fake()->randomDigitNotZero(),
            'last_transaction_at' => fake()->dateTimeThisYear(),
            'start_date' => $start->format('Y-m-d'),
            'expiry_date' => $start->modify('+1 year')->format('Y-m-d'),
        ];
    }
}
