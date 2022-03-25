<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = config('const.City');
        $names = config('const.TeamName');

        for($i = 0; $i < count($cities); $i++) {
            Team::create([
                'city' => $cities[$i],
                'name' => $names[$i]
            ]);
        }
    }
}
