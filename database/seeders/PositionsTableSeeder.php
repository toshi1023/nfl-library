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
            'category' => config('const.Category.QB'),
            'name' => 'QB'
        ]);
        // RB
        Position::create([
            'category' => config('const.Category.HB'),
            'name' => 'RB'
        ]);
        // HB
        Position::create([
            'category' => config('const.Category.HB'),
            'name' => 'HB'
        ]);
        // FB
        Position::create([
            'category' => config('const.Category.FB'),
            'name' => 'FB'
        ]);
        // WR
        Position::create([
            'category' => config('const.Category.WR'),
            'name' => 'WR'
        ]);
        // WR/RB([saints]Ty Montgomery)
        Position::create([
            'category' => config('const.Category.WR'),
            'name' => 'WR/RB'
        ]);
        // WR/CB([lions]Jamal Agnew)
        Position::create([
            'category' => config('const.Category.WR'),
            'name' => 'WR/CB'
        ]);
        // TE
        Position::create([
            'category' => config('const.Category.TE'),
            'name' => 'TE'
        ]);
        // QB/TE([lions]Logan Thomas)
        Position::create([
            'category' => config('const.Category.TE'),
            'name' => 'QB/TE'
        ]);

        // RG
        Position::create([
            'category' => config('const.Category.RG'),
            'name' => 'RG'
        ]);
        // G
        Position::create([
            'category' => config('const.Category.RG'),
            'name' => 'G'
        ]);
        // LG
        Position::create([
            'category' => config('const.Category.LG'),
            'name' => 'LG'
        ]);
        // OG
        Position::create([
            'category' => config('const.Category.LG'),
            'name' => 'OG'
        ]);

        // RT
        Position::create([
            'category' => config('const.Category.ROT'),
            'name' => 'RT'
        ]);
        // OT
        Position::create([
            'category' => config('const.Category.ROT'),
            'name' => 'OT'
        ]);
        // LT
        Position::create([
            'category' => config('const.Category.LOT'),
            'name' => 'LT'
        ]);
        // T
        Position::create([
            'category' => config('const.Category.LOT'),
            'name' => 'T'
        ]);
        // G,T([patriots]Marshall Newhouse)
        Position::create([
            'category' => config('const.Category.LOT'),
            'name' => 'G,T'
        ]);

        // C
        Position::create([
            'category' => config('const.Category.C'),
            'name' => 'C'
        ]);
        // OL
        Position::create([
            'category' => config('const.Category.C'),
            'name' => 'OL'
        ]);

        
        /** 
         *  Defence Category
         **/

        // RDT
        Position::create([
            'category' => config('const.Category.RDT'),
            'name' => 'RDT'
        ]);
        // DT
        Position::create([
            'category' => config('const.Category.RDT'),
            'name' => 'DT'
        ]);
        // LDT
        Position::create([
            'category' => config('const.Category.LDT'),
            'name' => 'LDT'
        ]);
        // DL
        Position::create([
            'category' => config('const.Category.LDT'),
            'name' => 'DL'
        ]);
        // NT
        Position::create([
            'category' => config('const.Category.NT'),
            'name' => 'NT'
        ]);

        // RDE
        Position::create([
            'category' => config('const.Category.RDE'),
            'name' => 'RDE'
        ]);
        // RE
        Position::create([
            'category' => config('const.Category.RDE'),
            'name' => 'RE'
        ]);
        // EDGE([49ers]Nick Bosa)
        Position::create([
            'category' => config('const.Category.RDE'),
            'name' => 'EDGE'
        ]);
        // LDE
        Position::create([
            'category' => config('const.Category.LDE'),
            'name' => 'LDE'
        ]);
        // LE
        Position::create([
            'category' => config('const.Category.LDE'),
            'name' => 'LE'
        ]);
        // DE
        Position::create([
            'category' => config('const.Category.LDE'),
            'name' => 'DE'
        ]);

        // MLB
        Position::create([
            'category' => config('const.Category.MLB'),
            'name' => 'MLB'
        ]);
        // ILB
        Position::create([
            'category' => config('const.Category.MLB'),
            'name' => 'ILB'
        ]);
        // RILB
        Position::create([
            'category' => config('const.Category.MLB'),
            'name' => 'RILB'
        ]);
        // LILB
        Position::create([
            'category' => config('const.Category.MLB'),
            'name' => 'LILB'
        ]);
        // RLB
        Position::create([
            'category' => config('const.Category.RLB'),
            'name' => 'RLB'
        ]);
        // ROLB
        Position::create([
            'category' => config('const.Category.RLB'),
            'name' => 'ROLB'
        ]);
        // OLB
        Position::create([
            'category' => config('const.Category.RLB'),
            'name' => 'OLB'
        ]);
        // DT/LB([bills]Lorenzo Alexander)
        Position::create([
            'category' => config('const.Category.RLB'),
            'name' => 'DT/LB'
        ]);
        // LLB
        Position::create([
            'category' => config('const.Category.LLB'),
            'name' => 'LLB'
        ]);
        // LOLB
        Position::create([
            'category' => config('const.Category.LLB'),
            'name' => 'LOLB'
        ]);
        // LB
        Position::create([
            'category' => config('const.Category.LLB'),
            'name' => 'LB'
        ]);

        // RCB
        Position::create([
            'category' => config('const.Category.RCB'),
            'name' => 'RCB'
        ]);
        // CB
        Position::create([
            'category' => config('const.Category.RCB'),
            'name' => 'CB'
        ]);
        // LCB
        Position::create([
            'category' => config('const.Category.LCB'),
            'name' => 'LCB'
        ]);
        // DB
        Position::create([
            'category' => config('const.Category.LCB'),
            'name' => 'DB'
        ]);
        
        // SS
        Position::create([
            'category' => config('const.Category.SS'),
            'name' => 'SS'
        ]);
        // S
        Position::create([
            'category' => config('const.Category.SS'),
            'name' => 'S'
        ]);
        // FS
        Position::create([
            'category' => config('const.Category.FS'),
            'name' => 'FS'
        ]);


        /** 
         *  Special Category
         **/
        // K
        Position::create([
            'category' => config('const.Category.K'),
            'name' => 'K'
        ]);
        // P
        Position::create([
            'category' => config('const.Category.P'),
            'name' => 'P'
        ]);
        // LS
        Position::create([
            'category' => config('const.Category.LS'),
            'name' => 'LS'
        ]);
        // LS,TE
        Position::create([
            'category' => config('const.Category.LS'),
            'name' => 'LS,TE'
        ]);

        // ポジション情報が無い場合
        Position::create([
            'category' => config('const.Category.NOTHING'),
            'name' => 'No Data'
        ]);
    }
}
