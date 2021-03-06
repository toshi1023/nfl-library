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
        // プロセット(スプリットバック) FB & HB
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Pro set(Split back) FB & HB'
        ]);
        // プロセット(スプリットバック) HB & HB
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Pro set(Split back) HB & HB'
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
        // フレックスボーン (WRが4人バージョン)
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Flexbone WR4'
        ]);
        // フレックスボーン (WRが2人・TEが2人バージョン)
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Flexbone WR2 & TE2'
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
        // Nickel(ニッケル) ※LCBが多い場合
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => 'Nickel(LCB)'
        ]);
        // Nickel(ニッケル) ※RCBが多い場合
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => 'Nickel(LCB)'
        ]);
        // Dime(ダイム)
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => 'Dime'
        ]);
        // 46(フォーシックス)
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '46'
        ]);
        // 1-6-4
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '1-6-4'
        ]);
        // 2-4-5
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '2-4-5'
        ]);
        // 3-7-1
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '3-7-1'
        ]);
        // 3-6-2
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '3-6-2'
        ]);
        // 4-6-1
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '4-6-1'
        ]);
        // 4-5-2
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '4-5-2'
        ]);
        // 5-5-1
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '5-5-1'
        ]);
        // 5-4-2
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '5-4-2'
        ]);
        // 6-4-1
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '6-4-1'
        ]);
        // 6-3-2
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '6-3-2'
        ]);
        // 3-3-5
        Formation::create([
            'odflg' => config('const.ODflg.defence'),
            'name' => '3-3-5'
        ]);

        // シングルバック TE
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'Single set back TE'
        ]);
        // Iフォーメーション TE
        Formation::create([
            'odflg' => config('const.ODflg.offence'),
            'name' => 'I formation TE'
        ]);
    }
}
