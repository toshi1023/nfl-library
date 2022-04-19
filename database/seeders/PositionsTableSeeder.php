<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionsTableSeeder extends Seeder
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

        // QB
        Position::create([
            'abstract_category' => config('const.AbstCate.QB'),
            'category' => config('const.Category.QB'),
            'name' => 'QB'
        ]);
        // RB
        Position::create([
            'abstract_category' => config('const.AbstCate.RB'),
            'category' => config('const.Category.HB'),
            'name' => 'RB'
        ]);
        // HB
        Position::create([
            'abstract_category' => config('const.AbstCate.RB'),
            'category' => config('const.Category.HB'),
            'name' => 'HB'
        ]);
        // FB
        Position::create([
            'abstract_category' => config('const.AbstCate.RB'),
            'category' => config('const.Category.FB'),
            'name' => 'FB'
        ]);
        // WR
        Position::create([
            'abstract_category' => config('const.AbstCate.WR'),
            'category' => config('const.Category.WR'),
            'name' => 'WR'
        ]);
        // WR/RB([saints]Ty Montgomery)
        Position::create([
            'abstract_category' => config('const.AbstCate.WR'),
            'category' => config('const.Category.WR'),
            'name' => 'WR/RB'
        ]);
        // WR/CB([lions]Jamal Agnew)
        Position::create([
            'abstract_category' => config('const.AbstCate.WR'),
            'category' => config('const.Category.WR'),
            'name' => 'WR/CB'
        ]);
        // PR([bears]Devin Hester)
        Position::create([
            'abstract_category' => config('const.AbstCate.WR'),
            'category' => config('const.Category.WR'),
            'name' => 'PR'
        ]);
        // TE
        Position::create([
            'abstract_category' => config('const.AbstCate.TE'),
            'category' => config('const.Category.TE'),
            'name' => 'TE'
        ]);
        // QB/TE([lions]Logan Thomas)
        Position::create([
            'abstract_category' => config('const.AbstCate.TE'),
            'category' => config('const.Category.TE'),
            'name' => 'QB/TE'
        ]);

        // RG
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.RG'),
            'name' => 'RG'
        ]);
        // G
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.RG'),
            'name' => 'G'
        ]);
        // LG
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LG'),
            'name' => 'LG'
        ]);
        // OG
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LG'),
            'name' => 'OG'
        ]);

        // RT
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.ROT'),
            'name' => 'RT'
        ]);
        // OT
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.ROT'),
            'name' => 'OT'
        ]);
        // LT
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LOT'),
            'name' => 'LT'
        ]);
        // T
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LOT'),
            'name' => 'T'
        ]);
        // G,T([patriots]Marshall Newhouse)
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LOT'),
            'name' => 'G,T'
        ]);

        // C
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.C'),
            'name' => 'C'
        ]);
        // OL
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.C'),
            'name' => 'OL'
        ]);
        // G/C
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.C'),
            'name' => 'G/C'
        ]);
        // G,C
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.C'),
            'name' => 'G,C'
        ]);

        
        /** 
         *  Defence Category
         **/

        // RDT
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDT'),
            'name' => 'RDT'
        ]);
        // DT
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDT'),
            'name' => 'DT'
        ]);
        // LDT
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDT'),
            'name' => 'LDT'
        ]);
        // DL
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDT'),
            'name' => 'DL'
        ]);
        // NT
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.NT'),
            'name' => 'NT'
        ]);

        // RDE
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDE'),
            'name' => 'RDE'
        ]);
        // RE
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDE'),
            'name' => 'RE'
        ]);
        // EDGE([49ers]Nick Bosa)
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDE'),
            'name' => 'EDGE'
        ]);
        // LDE
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDE'),
            'name' => 'LDE'
        ]);
        // LE
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDE'),
            'name' => 'LE'
        ]);
        // DE
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDE'),
            'name' => 'DE'
        ]);

        // MLB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.MLB'),
            'name' => 'MLB'
        ]);
        // IL
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.MLB'),
            'name' => 'IL'
        ]);
        // ILB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.MLB'),
            'name' => 'ILB'
        ]);
        // RILB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.MLB'),
            'name' => 'RILB'
        ]);
        // LILB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.MLB'),
            'name' => 'LILB'
        ]);
        // RLB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.RLB'),
            'name' => 'RLB'
        ]);
        // ROLB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.RLB'),
            'name' => 'ROLB'
        ]);
        // OLB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.RLB'),
            'name' => 'OLB'
        ]);
        // DT/LB([bills]Lorenzo Alexander)
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.RLB'),
            'name' => 'DT/LB'
        ]);
        // LLB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.LLB'),
            'name' => 'LLB'
        ]);
        // LOLB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.LLB'),
            'name' => 'LOLB'
        ]);
        // LB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.LLB'),
            'name' => 'LB'
        ]);

        // RCB
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.RCB'),
            'name' => 'RCB'
        ]);
        // CB
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.RCB'),
            'name' => 'CB'
        ]);
        // LCB
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.LCB'),
            'name' => 'LCB'
        ]);
        // DB
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.LCB'),
            'name' => 'DB'
        ]);
        
        // SS
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.SS'),
            'name' => 'SS'
        ]);
        // S
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.SS'),
            'name' => 'S'
        ]);
        // FS
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.FS'),
            'name' => 'FS'
        ]);


        /** 
         *  Special Category
         **/
        // K
        Position::create([
            'abstract_category' => config('const.AbstCate.K'),
            'category' => config('const.Category.K'),
            'name' => 'K'
        ]);
        // P
        Position::create([
            'abstract_category' => config('const.AbstCate.K'),
            'category' => config('const.Category.P'),
            'name' => 'P'
        ]);
        // LS
        Position::create([
            'abstract_category' => config('const.AbstCate.LS'),
            'category' => config('const.Category.LS'),
            'name' => 'LS'
        ]);
        // LS,TE
        Position::create([
            'abstract_category' => config('const.AbstCate.LS'),
            'category' => config('const.Category.LS'),
            'name' => 'LS,TE'
        ]);

        // ポジション情報が無い場合
        Position::create([
            'abstract_category' => config('const.AbstCate.NOTHING'),
            'category' => config('const.Category.NOTHING'),
            'name' => 'No Data'
        ]);
    }
}
