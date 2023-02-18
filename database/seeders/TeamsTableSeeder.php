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
        $areas = function($key) {
            $area = 0;
            if(($key >= 0 && $key < 4) || ($key >= 16 && $key < 20)) $area = 1;
            if(($key >= 4 && $key < 8) || ($key >= 20 && $key < 24)) $area = 2;
            if(($key >= 8 && $key < 12) || ($key >= 24 && $key < 28)) $area = 3;
            if(($key >= 12 && $key < 16) || ($key >= 28 && $key < 32)) $area = 4;
            return $area;
        };

        for($i = 0; $i < count($cities); $i++) {
            Team::create([
                'city'       => $cities[$i],
                'name'       => $names[$i],
                'conference' => $i < 16 ? 1 : 2,
                'area'       => $areas($i)
            ]);
        }
    }
}
