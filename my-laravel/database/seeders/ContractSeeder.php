<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Contract;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Find specific user by email
        $customer = Customer::where('email', 'aristos.aresti@gmail.com')->first();

        if (!$customer) {
            $this->command->error('User not found!');
            return;
        }

        // Use the factory to create 5 contracts for the specific user
        Contract::factory()->count(5)->create([
            'customer_id' => $customer->id,
        ]);

        $this->command->info('5 Contracts for customer created successfully!');
    }
}
