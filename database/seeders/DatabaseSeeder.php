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
        $this->call(TeamsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(FormationsTableSeeder::class);
        $this->call(PfRelationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(FoulRulesTableSeeder::class);
    }
}
