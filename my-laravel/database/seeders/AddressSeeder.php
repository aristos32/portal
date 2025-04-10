<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find specific user by email
        $user = User::where('email', 'aristos.aresti@gmail.com')->first();

        if (!$user) {
            $this->command->error('User not found!');
            return;
        }

        // Create 3 addresses for the user
        $user->addresses()->create([
            'type' => 'correspondence',
            'street' => '1234 Elm St',
            'city' => 'Springfield',
            'state' => 'IL',
            'area_code' => '62701',
            'country' => 'USA',
        ]);

        $user->addresses()->create([
            'type' => 'insured',
            'street' => '5678 Maple St',
            'city' => 'Springfield',
            'state' => 'IL',
            'area_code' => '62701',
            'country' => 'USA',
        ]);

        $user->addresses()->create([
            'type' => 'residence',
            'street' => '91011 Oak St',
            'city' => 'Springfield',
            'state' => 'IL',
            'area_code' => '62701',
            'country' => 'USA',
        ]);

        $user->addresses()->create([
            'type' => 'business',
            'street' => '1213 Pine St',
            'city' => 'Springfield',
            'state' => 'IL',
            'area_code' => '62701',
            'country' => 'USA',
        ]);
        $this->command->info('Addresses created successfully!');
    }
}
