<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use App\Models\Job;
use App\Models\Customer;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Aristos',
            'last_name' => 'Aresti',
            'email' => 'aristos.aresti@gmail.com',
            'password' => bcrypt('s@bNyKe.V8FWyGe'),
            'identity_number' => '764490',
        ]);

        Customer::factory()->create([
            'first_name' => 'Aristos',
            'last_name' => 'Aresti',
            'identity_number' => '764490',
            'identity_type' => 'passport',
            'type' => 'account',
            'gender' => 'male',
            'email' => 'aristos.aresti@gmail.com',
            'phone' => '1234567890',
            'cellphone' => '0987654321',
            'profession' => 'Software Engineer',
            'birthdate' => '1977-01-01',
            'nationality' => 'Cyprus',
        ]);

        User::factory(2)->create();

        Job::factory(100)->create();

        Account::factory(100)->create();

        Customer::factory(100)->create();

        $this->call(ContractSeeder::class);

        $this->call(AddressSeeder::class);
    }
}
