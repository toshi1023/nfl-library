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
        $logos = [
            'bills.gif', 'patriots.gif', 'dolphins.gif', 'jets.gif',
            'bengals.gif', 'steelers.gif', 'browns.gif', 'ravens.gif',
            'titans.gif', 'colts.gif', 'texans.gif', 'jaguars.gif',
            'chiefs.gif', 'raiders.gif', 'chargers.gif', 'broncos.gif',
            'cowboys.gif', 'eagles.gif', 'commanders.gif', 'giants.gif',
            'packers.gif', 'vikings.gif', 'bears.gif', 'lions.gif',
            'buccaneers.gif', 'saints.gif', 'falcons.gif', 'panthers.gif',
            'rams.gif', 'cardinals.gif', '49ers.gif', 'seahawks.gif',
        ];
        $covers = [
            'bills_cover.jpg', 'patriots_cover.jpg', 'dolphins_cover.jpg', 'jets_cover.jpg',
            'bengals_cover.jpg', 'steelers_cover.jpg', 'browns_cover.jpg', 'ravens_cover.jpg',
            'titans_cover.jpg', 'colts_cover.jpg', 'texans_cover.jpg', 'jaguars_cover.jpg',
            'chiefs_cover.jpg', 'raiders_cover.jpg', 'chargers_cover.jpg', 'broncos_cover.jpg',
            'cowboys_cover.jpg', 'eagles_cover.jpg', 'commanders_cover.jpg', 'giants_cover.jpg',
            'packers_cover.jpg', 'vikings_cover.jpg', 'bears_cover.jpg', 'lions_cover.jpg',
            'buccaneers_cover.jpg', 'saints_cover.jpg', 'falcons_cover.jpg', 'panthers_cover.jpg',
            'rams_cover.jpg', 'cardinals_cover.jpg', '49ers_cover.jpg', 'seahawks_cover.jpg',
        ];

        for($i = 0; $i < count($cities); $i++) {
            Team::create([
                'city'       => $cities[$i],
                'name'       => $names[$i],
                'conference' => $i < 16 ? 1 : 2,
                'area'       => $areas($i),
                'image_file' => $logos[$i],
                'back_image_file' => $covers[$i]
            ]);
        }
    }
}
