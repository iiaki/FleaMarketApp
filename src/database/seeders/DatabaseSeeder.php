<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ConditionSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ItemsTableSeeder::class);
    }
}
