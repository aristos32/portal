<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contract;

class ContractSeeder extends Seeder
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

        // Use the factory to create 5 contracts for the specific user
        Contract::factory()->count(5)->create([
            'user_id' => $user->id,
        ]);

        $this->command->info('5 Contracts for user created successfully!');


    }
}
