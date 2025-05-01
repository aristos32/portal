<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'identity_number' => fake()->unique()->numerify('############'),
            'identity_type' => fake()->randomElement(['passport', 'national_id']),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => fake()->phoneNumber(),
            'cellphone' => fake()->phoneNumber(),
            'birthdate' => fake()->date(),
            'nationality' => fake()->country(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            //'admin' => false
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the model is an admin.
     * User::factory()->admin()->create(); // create an admin user
     *
     * aristos: keep this as 'state' reference, admin field is not in the database
     */
    // public function admin(): static
    // {
    //     return $this->state(fn(array $attributes) => [
    //         'admin' => true,
    //     ]);
    // }
}
