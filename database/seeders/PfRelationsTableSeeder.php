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
            'formation_id'      => config('const.Formationid.T'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.T'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.T'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.T'),
            'position_category' => config('const.Category.FB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.T'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.T'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.T'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.T'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.T'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.T'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.T'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);


        // Iフォーメーション
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I'),
            'position_category' => config('const.Category.FB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);


        // シングルバック
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);


        // スプレッドフォーメーション
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SF'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SF'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SF'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SF'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SF'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SF'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SF'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SF'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SF'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SF'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SF'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);


        // プロセット(スプリットバック) FB & HB
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSFH'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSFH'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSFH'),
            'position_category' => config('const.Category.FB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSFH'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSFH'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSFH'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSFH'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSFH'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSFH'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSFH'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSFH'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);

        // プロセット(スプリットバック) HB & HB
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSHH'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSHH'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSHH'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSHH'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSHH'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSHH'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSHH'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSHH'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSHH'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSHH'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PSHH'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);

        // ショットガン
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SG'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SG'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SG'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SG'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SG'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SG'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SG'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SG'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SG'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SG'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SG'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);


        // ピストルフォーメーション
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PF'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PF'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PF'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PF'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PF'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PF'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PF'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PF'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PF'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PF'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.PF'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);


        // ウィッシュボーン
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WB'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WB'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WB'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WB'),
            'position_category' => config('const.Category.FB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WB'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WB'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WB'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WB'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WB'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WB'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WB'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);


        // フレックスボーン(WRが4人バージョン)
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBW4'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBW4'),
            'position_category' => config('const.Category.FB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBW4'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBW4'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBW4'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBW4'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBW4'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBW4'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBW4'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBW4'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBW4'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);

        // フレックスボーン(WRが2人・TEが2人バージョン)
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBWT'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBWT'),
            'position_category' => config('const.Category.FB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBWT'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBWT'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBWT'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBWT'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBWT'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBWT'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBWT'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBWT'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.FBWT'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);


        // ウィングT
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WT'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WT'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WT'),
            'position_category' => config('const.Category.FB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WT'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WT'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WT'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WT'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WT'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WT'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WT'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.WT'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);


        // エンプティバックフィールド
        PfRelation::create([
            'formation_id'      => config('const.Formationid.EB'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.EB'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.EB'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.EB'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.EB'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.EB'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.EB'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.EB'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.EB'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.EB'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.EB'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);


        /** 
         *  Defence Category
         **/

        // 3-4
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-4'),
            'position_category' => config('const.Category.NT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-4'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-4'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-4'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-4'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-4'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-4'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-4'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-4'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-4'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-4'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);


        // 4-3
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-3'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-3'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-3'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-3'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-3'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-3'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-3'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-3'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-3'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-3'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-3'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);


        // 4-4
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-4'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-4'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-4'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-4'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-4'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-4'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-4'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-4'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-4'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-4'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-4'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);


        // 5-2
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-2'),
            'position_category' => config('const.Category.NT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-2'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-2'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-2'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-2'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-2'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-2'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-2'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-2'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-2'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-2'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // Nickel(LCB)
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_LCB'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_LCB'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_LCB'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_LCB'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_LCB'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_LCB'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_LCB'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_LCB'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_LCB'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_LCB'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_LCB'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // Nickel(RCB)
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_RCB'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_RCB'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_RCB'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_RCB'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_RCB'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_RCB'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_RCB'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_RCB'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_RCB'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_RCB'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Nickel_RCB'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // Dime
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Dime'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Dime'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Dime'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Dime'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Dime'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Dime'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Dime'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Dime'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Dime'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Dime'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.Dime'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // 46
        PfRelation::create([
            'formation_id'      => config('const.Formationid.46'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.46'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.46'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.46'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.46'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.46'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.46'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.46'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.46'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.46'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.46'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // 1-6-4
        PfRelation::create([
            'formation_id'      => config('const.Formationid.1-6-4'),
            'position_category' => config('const.Category.NT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.1-6-4'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.1-6-4'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.1-6-4'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.1-6-4'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.1-6-4'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.1-6-4'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.1-6-4'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.1-6-4'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.1-6-4'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.1-6-4'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // 2-4-5
        PfRelation::create([
            'formation_id'      => config('const.Formationid.2-4-5'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.2-4-5'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.2-4-5'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.2-4-5'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.2-4-5'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.2-4-5'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.2-4-5'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.2-4-5'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.2-4-5'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.2-4-5'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.2-4-5'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // 3-7-1
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-7-1'),
            'position_category' => config('const.Category.NT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-7-1'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-7-1'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-7-1'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-7-1'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-7-1'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-7-1'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-7-1'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-7-1'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-7-1'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-7-1'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // 3-6-2
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-6-2'),
            'position_category' => config('const.Category.NT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-6-2'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-6-2'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-6-2'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-6-2'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-6-2'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-6-2'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-6-2'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-6-2'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-6-2'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-6-2'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // 4-6-1
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-6-1'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-6-1'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-6-1'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-6-1'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-6-1'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-6-1'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-6-1'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-6-1'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-6-1'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-6-1'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-6-1'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // 4-5-2
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-5-2'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-5-2'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-5-2'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-5-2'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-5-2'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-5-2'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-5-2'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-5-2'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-5-2'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-5-2'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.4-5-2'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // 5-5-1
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-5-1'),
            'position_category' => config('const.Category.NT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-5-1'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-5-1'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-5-1'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-5-1'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-5-1'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-5-1'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-5-1'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-5-1'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-5-1'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-5-1'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // 5-4-2
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-4-2'),
            'position_category' => config('const.Category.NT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-4-2'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-4-2'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-4-2'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-4-2'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-4-2'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-4-2'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-4-2'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-4-2'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-4-2'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.5-4-2'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // 6-4-1
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-4-1'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-4-1'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-4-1'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-4-1'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-4-1'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-4-1'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-4-1'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-4-1'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-4-1'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-4-1'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-4-1'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // 6-3-2
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-3-2'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-3-2'),
            'position_category' => config('const.Category.RDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-3-2'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-3-2'),
            'position_category' => config('const.Category.LDT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-3-2'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-3-2'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-3-2'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-3-2'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-3-2'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-3-2'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.6-3-2'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // 3-3-5
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-3-5'),
            'position_category' => config('const.Category.NT'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-3-5'),
            'position_category' => config('const.Category.RDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-3-5'),
            'position_category' => config('const.Category.LDE'),
            'abstract_category' => config('const.AbstCate.DL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-3-5'),
            'position_category' => config('const.Category.RLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-3-5'),
            'position_category' => config('const.Category.MLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-3-5'),
            'position_category' => config('const.Category.LLB'),
            'abstract_category' => config('const.AbstCate.LB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-3-5'),
            'position_category' => config('const.Category.RCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-3-5'),
            'position_category' => config('const.Category.LCB'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-3-5'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-3-5'),
            'position_category' => config('const.Category.SS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.3-3-5'),
            'position_category' => config('const.Category.FS'),
            'abstract_category' => config('const.AbstCate.DB')
        ]);

        // シングルバック TE
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB_TE'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB_TE'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB_TE'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB_TE'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB_TE'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB_TE'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB_TE'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB_TE'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB_TE'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB_TE'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.SSB_TE'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);

        // Iフォーメーション TE
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I_TE'),
            'position_category' => config('const.Category.QB'),
            'abstract_category' => config('const.AbstCate.QB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I_TE'),
            'position_category' => config('const.Category.HB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I_TE'),
            'position_category' => config('const.Category.FB'),
            'abstract_category' => config('const.AbstCate.RB')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I_TE'),
            'position_category' => config('const.Category.WR'),
            'abstract_category' => config('const.AbstCate.WR')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I_TE'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I_TE'),
            'position_category' => config('const.Category.TE'),
            'abstract_category' => config('const.AbstCate.TE')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I_TE'),
            'position_category' => config('const.Category.ROT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I_TE'),
            'position_category' => config('const.Category.LOT'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I_TE'),
            'position_category' => config('const.Category.RG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I_TE'),
            'position_category' => config('const.Category.LG'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
        PfRelation::create([
            'formation_id'      => config('const.Formationid.I_TE'),
            'position_category' => config('const.Category.C'),
            'abstract_category' => config('const.AbstCate.OL')
        ]);
    }
}
