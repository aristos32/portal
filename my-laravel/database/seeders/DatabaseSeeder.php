<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use App\Models\Job;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Aristos',
            'last_name' => 'Aresti',
            'email' => 'aristos.aresti@gmail.com',
            'password' => bcrypt('s@bNyKe.V8FWyGe'),
        ]);

        Job::factory(100)->create();

        Account::factory(100)->create();
    }
}
