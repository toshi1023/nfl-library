<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'user_id'       => 1,
            'setting_id'    => 1,       // Season検索の表示有無
            'flg'           => true
        ]);
        Setting::create([
            'user_id'       => 1,
            'setting_id'    => 2,       // Team検索の表示有無
            'flg'           => false
        ]);
    }
}
