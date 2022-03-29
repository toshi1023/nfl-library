<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formation;

class FormationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** 
         *  Offence Category
         **/

        // Tフォーメーション
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'T formation'
        ]);
        // Iフォーメーション
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'I formation'
        ]);
        // シングルバック
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Single set back'
        ]);
        // スプレッドフォーメーション
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Spread formation'
        ]);
        // プロセット(スプリットバック)
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Pro set(Split back)'
        ]);
        // ショットガン
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Shotgun'
        ]);
        // ピストルフォーメーション
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Pistol formation'
        ]);
        // ウィッシュボーン
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Wishbone'
        ]);
        // フレックスボーン
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Flexbone'
        ]);
        // ウィングT
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Wing T'
        ]);
        // エンプティバックフィールド
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Empty backfield'
        ]);
        // シングルウィング
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Single wing'
        ]);
        // ワイルドキャットフォーメーション
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Wildcat formation'
        ]);


        /** 
         *  Defence Category
         **/

        // 3-4
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '3-4'
        ]);
        // 4-3
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '4-3'
        ]);
        // 4-4
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '4-4'
        ]);
        // 5-2
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '5-2'
        ]);
    }
}
