<?php

namespace Database\Factories;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    protected $model = Quote::class;

    public function definition()
    {
        return [
            'symbol' => fake()->word,
            'price' => fake()->randomFloat(2, 100, 200),
            'open' => fake()->randomFloat(2, 100, 200),
            'high' => fake()->randomFloat(2, 100, 200),
            'low' => fake()->randomFloat(2, 100, 200),
            'volume' => fake()->numberBetween(1000000, 5000000),
            'latest_trading_day' => fake()->date,
            'previous_close' => fake()->randomFloat(2, 100, 200),
            'change' => fake()->randomFloat(2, -10, 10),
            'change_percent' => fake()->randomFloat(2, -5, 5) . '%',
        ];
    }
}


