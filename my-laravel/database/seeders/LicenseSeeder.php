<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find specific Customer by email
        $customer = Customer::where('email', 'aristos.aresti@gmail.com')->first();

        if (!$customer) {
            $this->command->error('Customer not found!');
            return;
        }

        // Create 3 addresses for the user
        $customer->licenses()->create([
            'type' => 'regular',
        ]);

        $customer->licenses()->create([
            'type' => 'learner',
        ]);
        $customer->licenses()->create([
            'type' => 'motorcycle',
        ]);
        $customer->licenses()->create([
            'type' => 'professional',
        ]);

        $this->command->info('Licenses created successfully!');
    }
}
