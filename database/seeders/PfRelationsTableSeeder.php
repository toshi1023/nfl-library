<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PfRelation;

class PfRelationsTableSeeder extends Seeder
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
        PfRelation::create([
            'formation_id'      => 1,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 1,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 1,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 1,
            'position_category' => config('const.Category.FB')
        ]);
        PfRelation::create([
            'formation_id'      => 1,
            'position_category' => config('const.Category.TE')
        ]);
        PfRelation::create([
            'formation_id'      => 1,
            'position_category' => config('const.Category.TE')
        ]);
        PfRelation::create([
            'formation_id'      => 1,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 1,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 1,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 1,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 1,
            'position_category' => config('const.Category.C')
        ]);


        // Iフォーメーション
        PfRelation::create([
            'formation_id'      => 2,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 2,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 2,
            'position_category' => config('const.Category.FB')
        ]);
        PfRelation::create([
            'formation_id'      => 2,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 2,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 2,
            'position_category' => config('const.Category.TE')
        ]);
        PfRelation::create([
            'formation_id'      => 2,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 2,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 2,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 2,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 2,
            'position_category' => config('const.Category.C')
        ]);


        // シングルバック
        PfRelation::create([
            'formation_id'      => 3,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 3,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 3,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 3,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 3,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 3,
            'position_category' => config('const.Category.TE')
        ]);
        PfRelation::create([
            'formation_id'      => 3,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 3,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 3,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 3,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 3,
            'position_category' => config('const.Category.C')
        ]);


        // スプレッドフォーメーション
        PfRelation::create([
            'formation_id'      => 4,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 4,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 4,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 4,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 4,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 4,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 4,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 4,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 4,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 4,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 4,
            'position_category' => config('const.Category.C')
        ]);


        // プロセット(スプリットバック) FB & HB
        PfRelation::create([
            'formation_id'      => 5,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 5,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 5,
            'position_category' => config('const.Category.FB')
        ]);
        PfRelation::create([
            'formation_id'      => 5,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 5,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 5,
            'position_category' => config('const.Category.TE')
        ]);
        PfRelation::create([
            'formation_id'      => 5,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 5,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 5,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 5,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 5,
            'position_category' => config('const.Category.C')
        ]);


        // ショットガン
        PfRelation::create([
            'formation_id'      => 6,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 6,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 6,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 6,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 6,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 6,
            'position_category' => config('const.Category.TE')
        ]);
        PfRelation::create([
            'formation_id'      => 6,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 6,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 6,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 6,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 6,
            'position_category' => config('const.Category.C')
        ]);


        // ピストルフォーメーション
        PfRelation::create([
            'formation_id'      => 7,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 7,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 7,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 7,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 7,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 7,
            'position_category' => config('const.Category.TE')
        ]);
        PfRelation::create([
            'formation_id'      => 7,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 7,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 7,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 7,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 7,
            'position_category' => config('const.Category.C')
        ]);


        // ウィッシュボーン
        PfRelation::create([
            'formation_id'      => 8,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 8,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 8,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 8,
            'position_category' => config('const.Category.FB')
        ]);
        PfRelation::create([
            'formation_id'      => 8,
            'position_category' => config('const.Category.TE')
        ]);
        PfRelation::create([
            'formation_id'      => 8,
            'position_category' => config('const.Category.TE')
        ]);
        PfRelation::create([
            'formation_id'      => 8,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 8,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 8,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 8,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 8,
            'position_category' => config('const.Category.C')
        ]);


        // フレックスボーン(WRが4人バージョン)
        PfRelation::create([
            'formation_id'      => 9,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 9,
            'position_category' => config('const.Category.FB')
        ]);
        PfRelation::create([
            'formation_id'      => 9,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 9,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 9,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 9,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 9,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 9,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 9,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 9,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 9,
            'position_category' => config('const.Category.C')
        ]);

        // フレックスボーン(WRが2人・TEが2人バージョン)
        PfRelation::create([
            'formation_id'      => 10,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 10,
            'position_category' => config('const.Category.FB')
        ]);
        PfRelation::create([
            'formation_id'      => 10,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 10,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 10,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 10,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 10,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 10,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 10,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 10,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 10,
            'position_category' => config('const.Category.C')
        ]);


        // ウィングT
        PfRelation::create([
            'formation_id'      => 11,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 11,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 11,
            'position_category' => config('const.Category.FB')
        ]);
        PfRelation::create([
            'formation_id'      => 11,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 11,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 11,
            'position_category' => config('const.Category.TE')
        ]);
        PfRelation::create([
            'formation_id'      => 11,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 11,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 11,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 11,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 11,
            'position_category' => config('const.Category.C')
        ]);


        // エンプティバックフィールド
        PfRelation::create([
            'formation_id'      => 12,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 12,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 12,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 12,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 12,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 12,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 12,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 12,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 12,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 12,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 12,
            'position_category' => config('const.Category.C')
        ]);

        // プロセット(スプリットバック) HB & HB
        PfRelation::create([
            'formation_id'      => 15,
            'position_category' => config('const.Category.QB')
        ]);
        PfRelation::create([
            'formation_id'      => 15,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 15,
            'position_category' => config('const.Category.HB')
        ]);
        PfRelation::create([
            'formation_id'      => 15,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 15,
            'position_category' => config('const.Category.WR')
        ]);
        PfRelation::create([
            'formation_id'      => 15,
            'position_category' => config('const.Category.TE')
        ]);
        PfRelation::create([
            'formation_id'      => 15,
            'position_category' => config('const.Category.ROT')
        ]);
        PfRelation::create([
            'formation_id'      => 15,
            'position_category' => config('const.Category.LOT')
        ]);
        PfRelation::create([
            'formation_id'      => 15,
            'position_category' => config('const.Category.RG')
        ]);
        PfRelation::create([
            'formation_id'      => 15,
            'position_category' => config('const.Category.LG')
        ]);
        PfRelation::create([
            'formation_id'      => 15,
            'position_category' => config('const.Category.C')
        ]);


        /** 
         *  Defence Category
         **/

        // 3-4
        PfRelation::create([
            'formation_id'      => 50,
            'position_category' => config('const.Category.NT')
        ]);
        PfRelation::create([
            'formation_id'      => 50,
            'position_category' => config('const.Category.RDE')
        ]);
        PfRelation::create([
            'formation_id'      => 50,
            'position_category' => config('const.Category.LDE')
        ]);
        PfRelation::create([
            'formation_id'      => 50,
            'position_category' => config('const.Category.MLB')
        ]);
        PfRelation::create([
            'formation_id'      => 50,
            'position_category' => config('const.Category.MLB')
        ]);
        PfRelation::create([
            'formation_id'      => 50,
            'position_category' => config('const.Category.RLB')
        ]);
        PfRelation::create([
            'formation_id'      => 50,
            'position_category' => config('const.Category.LLB')
        ]);
        PfRelation::create([
            'formation_id'      => 50,
            'position_category' => config('const.Category.RCB')
        ]);
        PfRelation::create([
            'formation_id'      => 50,
            'position_category' => config('const.Category.LCB')
        ]);
        PfRelation::create([
            'formation_id'      => 50,
            'position_category' => config('const.Category.SS')
        ]);
        PfRelation::create([
            'formation_id'      => 50,
            'position_category' => config('const.Category.FS')
        ]);


        // 4-3
        PfRelation::create([
            'formation_id'      => 51,
            'position_category' => config('const.Category.RDT')
        ]);
        PfRelation::create([
            'formation_id'      => 51,
            'position_category' => config('const.Category.LDT')
        ]);
        PfRelation::create([
            'formation_id'      => 51,
            'position_category' => config('const.Category.RDE')
        ]);
        PfRelation::create([
            'formation_id'      => 51,
            'position_category' => config('const.Category.LDE')
        ]);
        PfRelation::create([
            'formation_id'      => 51,
            'position_category' => config('const.Category.MLB')
        ]);
        PfRelation::create([
            'formation_id'      => 51,
            'position_category' => config('const.Category.RLB')
        ]);
        PfRelation::create([
            'formation_id'      => 51,
            'position_category' => config('const.Category.LLB')
        ]);
        PfRelation::create([
            'formation_id'      => 51,
            'position_category' => config('const.Category.RCB')
        ]);
        PfRelation::create([
            'formation_id'      => 51,
            'position_category' => config('const.Category.LCB')
        ]);
        PfRelation::create([
            'formation_id'      => 51,
            'position_category' => config('const.Category.SS')
        ]);
        PfRelation::create([
            'formation_id'      => 51,
            'position_category' => config('const.Category.FS')
        ]);


        // 4-4
        PfRelation::create([
            'formation_id'      => 52,
            'position_category' => config('const.Category.RDT')
        ]);
        PfRelation::create([
            'formation_id'      => 52,
            'position_category' => config('const.Category.LDT')
        ]);
        PfRelation::create([
            'formation_id'      => 52,
            'position_category' => config('const.Category.RDE')
        ]);
        PfRelation::create([
            'formation_id'      => 52,
            'position_category' => config('const.Category.LDE')
        ]);
        PfRelation::create([
            'formation_id'      => 52,
            'position_category' => config('const.Category.MLB')
        ]);
        PfRelation::create([
            'formation_id'      => 52,
            'position_category' => config('const.Category.MLB')
        ]);
        PfRelation::create([
            'formation_id'      => 52,
            'position_category' => config('const.Category.RLB')
        ]);
        PfRelation::create([
            'formation_id'      => 52,
            'position_category' => config('const.Category.LLB')
        ]);
        PfRelation::create([
            'formation_id'      => 52,
            'position_category' => config('const.Category.RCB')
        ]);
        PfRelation::create([
            'formation_id'      => 52,
            'position_category' => config('const.Category.LCB')
        ]);
        PfRelation::create([
            'formation_id'      => 52,
            'position_category' => config('const.Category.SS')
        ]);


        // 5-2
        PfRelation::create([
            'formation_id'      => 53,
            'position_category' => config('const.Category.NT')
        ]);
        PfRelation::create([
            'formation_id'      => 53,
            'position_category' => config('const.Category.RDT')
        ]);
        PfRelation::create([
            'formation_id'      => 53,
            'position_category' => config('const.Category.LDT')
        ]);
        PfRelation::create([
            'formation_id'      => 53,
            'position_category' => config('const.Category.RDE')
        ]);
        PfRelation::create([
            'formation_id'      => 53,
            'position_category' => config('const.Category.LDE')
        ]);
        PfRelation::create([
            'formation_id'      => 53,
            'position_category' => config('const.Category.MLB')
        ]);
        PfRelation::create([
            'formation_id'      => 53,
            'position_category' => config('const.Category.MLB')
        ]);
        PfRelation::create([
            'formation_id'      => 53,
            'position_category' => config('const.Category.RCB')
        ]);
        PfRelation::create([
            'formation_id'      => 53,
            'position_category' => config('const.Category.LCB')
        ]);
        PfRelation::create([
            'formation_id'      => 53,
            'position_category' => config('const.Category.SS')
        ]);
        PfRelation::create([
            'formation_id'      => 53,
            'position_category' => config('const.Category.FS')
        ]);
    }
}
