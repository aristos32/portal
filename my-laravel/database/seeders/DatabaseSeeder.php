<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use App\Models\Job;
use App\Models\Contract;
use App\Models\Employer;
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
        ]);

        User::factory(100)->create();

        Job::factory(100)->create();

        Account::factory(100)->create();

        $this->call(ContractSeeder::class);

        $this->call(AddressSeeder::class);
    }
}
