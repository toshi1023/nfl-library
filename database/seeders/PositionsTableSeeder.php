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
            'name' => 'QB',
            'odflg' => true
        ]);
        // RB
        Position::create([
            'abstract_category' => config('const.AbstCate.RB'),
            'category' => config('const.Category.HB'),
            'name' => 'RB',
            'odflg' => true
        ]);
        // HB
        Position::create([
            'abstract_category' => config('const.AbstCate.RB'),
            'category' => config('const.Category.HB'),
            'name' => 'HB',
            'odflg' => true
        ]);
        // FB
        Position::create([
            'abstract_category' => config('const.AbstCate.RB'),
            'category' => config('const.Category.FB'),
            'name' => 'FB',
            'odflg' => true
        ]);
        // WR
        Position::create([
            'abstract_category' => config('const.AbstCate.WR'),
            'category' => config('const.Category.WR'),
            'name' => 'WR',
            'odflg' => true
        ]);
        // WR/RB([saints]Ty Montgomery)
        Position::create([
            'abstract_category' => config('const.AbstCate.WR'),
            'category' => config('const.Category.WR'),
            'name' => 'WR/RB',
            'odflg' => true
        ]);
        // WR/CB([lions]Jamal Agnew)
        Position::create([
            'abstract_category' => config('const.AbstCate.WR'),
            'category' => config('const.Category.WR'),
            'name' => 'WR/CB',
            'odflg' => true
        ]);
        // PR([bears]Devin Hester)
        Position::create([
            'abstract_category' => config('const.AbstCate.WR'),
            'category' => config('const.Category.WR'),
            'name' => 'PR',
            'odflg' => true
        ]);
        // TE
        Position::create([
            'abstract_category' => config('const.AbstCate.TE'),
            'category' => config('const.Category.TE'),
            'name' => 'TE',
            'odflg' => true
        ]);
        // QB/TE([lions]Logan Thomas)
        Position::create([
            'abstract_category' => config('const.AbstCate.TE'),
            'category' => config('const.Category.TE'),
            'name' => 'QB/TE',
            'odflg' => true
        ]);

        // RG
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.RG'),
            'name' => 'RG',
            'odflg' => true
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.RG'),
            'name' => 'RG/RT',
            'odflg' => true
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.RG'),
            'name' => 'RG/C',
            'odflg' => true
        ]);
        // G
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.RG'),
            'name' => 'G',
            'odflg' => true
        ]);
        // LG
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LG'),
            'name' => 'LG',
            'odflg' => true
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LG'),
            'name' => 'LG/LT',
            'odflg' => true
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LG'),
            'name' => 'LG/C',
            'odflg' => true
        ]);
        // OG
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LG'),
            'name' => 'OG',
            'odflg' => true
        ]);

        // RT
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.ROT'),
            'name' => 'RT',
            'odflg' => true
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.ROT'),
            'name' => 'RT/LT',
            'odflg' => true
        ]);
        // OT
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.ROT'),
            'name' => 'OT',
            'odflg' => true
        ]);
        // LT
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LOT'),
            'name' => 'LT',
            'odflg' => true
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LOT'),
            'name' => 'LT/RT',
            'odflg' => true
        ]);
        // T
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LOT'),
            'name' => 'T',
            'odflg' => true
        ]);
        // G,T([patriots]Marshall Newhouse)
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.LOT'),
            'name' => 'G,T',
            'odflg' => true
        ]);

        // C
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.C'),
            'name' => 'C',
            'odflg' => true
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.C'),
            'name' => 'C/RG',
            'odflg' => true
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.C'),
            'name' => 'C/LG',
            'odflg' => true
        ]);
        // OL
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.C'),
            'name' => 'OL',
            'odflg' => true
        ]);
        // G/C
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.C'),
            'name' => 'G/C',
            'odflg' => true
        ]);
        // G,C
        Position::create([
            'abstract_category' => config('const.AbstCate.OL'),
            'category' => config('const.Category.C'),
            'name' => 'G,C',
            'odflg' => true
        ]);

        
        /** 
         *  Defence Category
         **/

        // RDT
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDT'),
            'name' => 'RDT',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDT'),
            'name' => 'RDT/RDE',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDT'),
            'name' => 'RDT/LDT',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDT'),
            'name' => 'RDT/LDE',
            'odflg' => false
        ]);
        // DT
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDT'),
            'name' => 'DT',
            'odflg' => false
        ]);
        // LDT
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDT'),
            'name' => 'LDT',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDT'),
            'name' => 'LDT/LDE',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDT'),
            'name' => 'LDT/RDT',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDT'),
            'name' => 'LDT/RDE',
            'odflg' => false
        ]);
        // DL
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDT'),
            'name' => 'DL',
            'odflg' => false
        ]);
        // NT
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.NT'),
            'name' => 'NT',
            'odflg' => false
        ]);

        // RDE
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDE'),
            'name' => 'RDE',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDE'),
            'name' => 'RDE/LDE',
            'odflg' => false
        ]);
        // RE
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDE'),
            'name' => 'RE',
            'odflg' => false
        ]);
        // EDGE([49ers]Nick Bosa)
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.RDE'),
            'name' => 'EDGE',
            'odflg' => false
        ]);
        // LDE
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDE'),
            'name' => 'LDE',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDE'),
            'name' => 'LDE/RDE',
            'odflg' => false
        ]);
        // LE
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDE'),
            'name' => 'LE',
            'odflg' => false
        ]);
        // DE
        Position::create([
            'abstract_category' => config('const.AbstCate.DL'),
            'category' => config('const.Category.LDE'),
            'name' => 'DE',
            'odflg' => false
        ]);

        // MLB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.MLB'),
            'name' => 'MLB',
            'odflg' => false
        ]);
        // IL
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.MLB'),
            'name' => 'IL',
            'odflg' => false
        ]);
        // ILB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.MLB'),
            'name' => 'ILB',
            'odflg' => false
        ]);
        // RILB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.MLB'),
            'name' => 'RILB',
            'odflg' => false
        ]);
        // LILB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.MLB'),
            'name' => 'LILB',
            'odflg' => false
        ]);
        // RLB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.RLB'),
            'name' => 'RLB',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.RLB'),
            'name' => 'RLB/LLB',
            'odflg' => false
        ]);
        // ROLB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.RLB'),
            'name' => 'ROLB',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.RLB'),
            'name' => 'ROLB/LOLB',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.RLB'),
            'name' => 'ROLB/LILB',
            'odflg' => false
        ]);
        // OLB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.RLB'),
            'name' => 'OLB',
            'odflg' => false
        ]);
        // DT/LB([bills]Lorenzo Alexander)
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.RLB'),
            'name' => 'DT/LB',
            'odflg' => false
        ]);
        // LLB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.LLB'),
            'name' => 'LLB',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.LLB'),
            'name' => 'LLB/RLB',
            'odflg' => false
        ]);
        // LOLB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.LLB'),
            'name' => 'LOLB',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.LLB'),
            'name' => 'LOLB/ROLB',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.LLB'),
            'name' => 'LOLB/RILB',
            'odflg' => false
        ]);
        // LB
        Position::create([
            'abstract_category' => config('const.AbstCate.LB'),
            'category' => config('const.Category.LLB'),
            'name' => 'LB',
            'odflg' => false
        ]);

        // RCB
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.RCB'),
            'name' => 'RCB',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.RCB'),
            'name' => 'RCB/LCB',
            'odflg' => false
        ]);
        // CB
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.RCB'),
            'name' => 'CB',
            'odflg' => false
        ]);
        // LCB
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.LCB'),
            'name' => 'LCB',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.LCB'),
            'name' => 'LCB/RCB',
            'odflg' => false
        ]);
        // DB
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.LCB'),
            'name' => 'DB',
            'odflg' => false
        ]);
        
        // SS
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.SS'),
            'name' => 'SS',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.SS'),
            'name' => 'SS/FS',
            'odflg' => false
        ]);
        // S
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.SS'),
            'name' => 'S',
            'odflg' => false
        ]);
        // FS
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.FS'),
            'name' => 'FS',
            'odflg' => false
        ]);
        Position::create([
            'abstract_category' => config('const.AbstCate.DB'),
            'category' => config('const.Category.FS'),
            'name' => 'FS/SS',
            'odflg' => false
        ]);


        /** 
         *  Special Category
         **/
        // K
        Position::create([
            'abstract_category' => config('const.AbstCate.K'),
            'category' => config('const.Category.K'),
            'name' => 'K',
            'odflg' => true
        ]);
        // P
        Position::create([
            'abstract_category' => config('const.AbstCate.K'),
            'category' => config('const.Category.P'),
            'name' => 'P',
            'odflg' => true
        ]);
        // LS
        Position::create([
            'abstract_category' => config('const.AbstCate.LS'),
            'category' => config('const.Category.LS'),
            'name' => 'LS',
            'odflg' => true
        ]);
        // LS,TE
        Position::create([
            'abstract_category' => config('const.AbstCate.LS'),
            'category' => config('const.Category.LS'),
            'name' => 'LS,TE',
            'odflg' => true
        ]);

        // ポジション情報が無い場合
        Position::create([
            'abstract_category' => config('const.AbstCate.NOTHING'),
            'category' => config('const.Category.NOTHING'),
            'name' => 'No Data',
            'odflg' => true
        ]);
    }
}
