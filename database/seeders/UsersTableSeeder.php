<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersCount = max((int)$this->command->ask('How many users?', 10), 1);

        \App\Models\User::factory()->gordonDeal()->create();
        \App\Models\User::factory($usersCount)->create();
    }
}
